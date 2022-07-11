<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Sip;
use App\Models\Terc;
use App\Models\Provider;
use App\Models\Sippeers;
use PAMI\Client\Impl\ClientImpl;
use Illuminate\Support\Facades\DB;
use PAMI\Message\Event\PeerEntryEvent;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;
use PAMI\Message\Action\SIPPeersAction;
use Illuminate\Validation\Rules\Password;
use PAMI\Message\Action\SIPShowPeerAction;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Traits\PluralTrait;
use App\Models\Extension;

class ProviderController extends Controller
{
    use PluralTrait;

  
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::with('sip')->get();

        foreach ($providers as $key => $provider) {
            $sip[$provider->sipuid] = $this->sippeers($provider->sipuid);
        }

     
        return view('provider.index', ['providers' => $providers, 'sip' => $sip]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provider.add', ['uniqid' => uniqid(),'options'=> SIP::$options]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProviderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProviderRequest $request)
    {
        $terc = $request->input('terc');
        $teryt = explode("|", $terc);
        $validated = $request->safe()->except(['description','terc']);
     
       
        $provider =  Provider::create([
            'id' => null,
            'uniqid' => $request->input('name'),
            'type' => 'SIP',
            'sipuid' =>   $request->input('name'),
            'description' => $request->input('description'),
            'WOJ' => $teryt[0],
            'POW' => $teryt[1],
            'GMI' => $teryt[2],
            'RODZ' => $teryt[3],
            'incomingA' =>  $request->input('incomingA'),
            'incomingB' =>  $request->input('incomingB'),
            'outgoingA' =>  $request->input('outgoingA'),
            'outgoingB' =>  $request->input('outgoingB'),

        ]);
        $validated['host'] = 'dynamic';
        $validated['type'] = 'friend';
        Sippeers::create($validated);

        $this->createsipconfig($provider);

        $this->create_extensions_config($provider);

        if ($request->input('regserver') == 'tak') {
            $port = $request->input('port');
            $this->add_register_config($request->input('name'), $request->input('secret'), $request->input('fromdomain'), $port = $port??'5060');
        }
       
        // $this->updatesipconfig();
        // $this->updateextenconfig();
        $this->reload();
        return redirect()->route('provider');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        if (Storage::disk('extensions')->exists($provider->sipuid.'.conf')) {
            $config =   Storage::disk('extensions')->get($provider->sipuid.'.conf');
        } else {
            $config = null;
        }


        $sip = $this->sippeers($provider->sipuid);
       
        $numbers = $provider->numbers()->paginate(10);
        $numbers_count = $provider->numbers()->get();


        $number_count =  $this->pluralNumber($numbers_count);

        $nka = DB::table('uke_nka')
                ->where('teryt_provinceid_ab', $provider->WOJ)
                ->where('teryt_districtid_ab', $provider->POW)
                ->where('teryt_communityid_ab', $provider->GMI)
                ->where('teryt_communitytype_ab', $provider->RODZ)
                ->get();

    
        //  $this->reload();

        return view('provider.show', ['provider' => $provider,'numbers' => $numbers,'number_count' => $number_count,'nka' => $nka,'sip' => $sip, 'config' => $config]);

        
        // $this->asteriskcommand();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('provider.edit', ['provider' => $provider, 'options' => SIP::$options]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProviderRequest  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        $validated = $request->safe()->except(['description','terc']);
      
   
        $terc = $request->input('terc');
        $teryt = explode("|", $terc);

        $provider->update([
                'description' => $request->input('description'),
                'WOJ' => $teryt[0],
                'POW' => $teryt[1],
                'GMI' => $teryt[2],
                'RODZ' => $teryt[3],
                'incomingA' =>  $request->input('incomingA'),
                'incomingB' =>  $request->input('incomingB'),
                'outgoingA' =>  $request->input('outgoingA'),
                'outgoingB' =>  $request->input('outgoingB'),
                ]);



        if ($request->input('regserver') == 'tak') {
            $port = $request->input('port');
            $this->add_register_config($provider->uniqid, $request->input('secret'), $request->input('fromdomain'), $port = $port??'5060');
        } else {
            Storage::disk('register')->delete("$provider->uniqid.conf");
        }
      
        

        $provider->sip->update($validated);

        $this->createsipconfig($provider);

        // $this->updatesipconfig();
        $this->create_extensions_config($provider);
        //  $this->updateextenconfig();
        $this->reload();
        return redirect()->route('provider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->sip->delete();
        $numbers = $provider->numbers;
        foreach ($numbers as $number) {
            $number->extension->delete();
        }
        
        $provider->numbers()->delete();
        $this->delete_config($provider->sipuid);
        $provider->delete();
        // $this->updatesipconfig();
        // $this->updateextenconfig();
        $this->reload();
        return redirect()->route('provider');
    }

   
    public function sippeers($name)
    {
        $options = array(
            'host' => config('app.ami_url'),
            'port' => config('app.ami_port'),
            'username' => config('app.ami_user'),
            'secret' => config('app.ami_password'),
            'connect_timeout' => '20',
            'read_timeout' => '40',
            'scheme' => 'tcp://'
        );
   
           
   
        $pamiClient = new ClientImpl($options);
        $pamiClient->open();


        $r = $pamiClient->send(new SIPShowPeerAction($name));

        $pamiClient->close();


        return $r->getKeys();
    }


    public function createsipconfig($provider)
    {
        $sip = $provider->sip;
        $conf = '' . PHP_EOL;
        $conf .= '['.$provider->uniqid.']' . PHP_EOL ."\t";


        if ($sip['permit'] == '') {
            $permit = '0.0.0.0/0.0.0.0';
        } else {
            $permit = $sip['permit'].'/32';
        }
   
        // 'defaultuser='.$sip['name'] . PHP_EOL ."\t".
        // 'accountcode='.$sip['name']  . PHP_EOL ."\t".
        $conf .= 'deny=0.0.0.0/0.0.0.0' . " \n\t";
        $conf .= 'secret='.$sip['secret']  . " \n\t";
        $conf .= 'context=from'.$sip['name']  . " \n\t";
        $conf .= 'insecure=port,invite'  . " \n\t";
        $conf .= 'type=friend'  . " \n\t";
        $conf .= 'host=dynamic'  . " \n\t";
        $conf .= 'dtmf=rfc2833'  . " \n\t";
        $conf .= 't38pt_udptl=yes,redundancy,maxdatagram=400'  . " \n\t";
        $conf .= 'call-limit='.$sip['call-limit']   . " \n\t";
        $conf .= 'disallow=all'  . " \n\t";
        $conf .= 'allow=alaw'  . " \n\t";
        $conf .= 'allow=ulaw'  . " \n\t";
        $conf .= 'permit='.$permit. " \n\t";
        $conf .= 'canreinvite=no'  . " \n\t";
        $conf .= 'directmedia=no'  . " \n\t";
        $conf .= 'directrtpsetup=no'  . " \n\t";
        $conf .= 'nat='.$sip['nat']   . " \n\t";
        $conf .= 'qualify=yes'  . " \n\n";



        $conf .= "[204]"   . " \n\t";
        $conf .= "type = auth"   . " \n\t";
        $conf .= "username = 204"   . " \n\t";
        $conf .= "password = 02d57103b46ae0c0a5e4c403c2cf0c15"   . " \n\t";
        
        $conf .= "[204]"   . " \n\t";
        $conf .= "type = aor"   . " \n\t";
        $conf .= "qualify_frequency = 60"   . " \n\t";
        $conf .= "qualify_timeout = 5"   . " \n\t";
        $conf .= "max_contacts = 5"   . " \n\t";
        
        $conf .= "[204]"   . " \n\t";
        $conf .= "type = endpoint"   . " \n\t";
        $conf .= "context = all_peers"   . " \n\t";
        $conf .= "dtmf_mode = auto"   . " \n\t";
        $conf .= "disallow = all"   . " \n\t";
        $conf .= "allow = alaw"   . " \n\t";
        $conf .= "allow = ulaw"   . " \n\t";
        $conf .= "allow = ilbc"   . " \n\t";
        $conf .= "allow = opus"   . " \n\t";
        $conf .= "allow = h264"   . " \n\t";
        $conf .= "rtp_symmetric = yes"   . " \n\t";
        $conf .= "force_rport = yes"   . " \n\t";
        $conf .= "rewrite_contact = yes"   . " \n\t";
        $conf .= "ice_support = no"   . " \n\t";
        $conf .= "direct_media = no"   . " \n\t";
        $conf .= "callerid = Marcin <204>"   . " \n\t";
        $conf .= "send_pai = yes"   . " \n\t";
        $conf .= "call_group = 1"   . " \n\t";
        $conf .= "pickup_group = 1"   . " \n\t";
        $conf .= "sdp_session = mikopbx"   . " \n\t";
        $conf .= "language = pl-pl"   . " \n\t";
        $conf .= "mailboxes = admin@voicemailcontext"   . " \n\t";
        $conf .= "device_state_busy_at = 1"   . " \n\t";
        $conf .= "aors = 204"   . " \n\t";
        $conf .= "auth = 204"   . " \n\t";
        $conf .= "outbound_auth = 204"   . " \n\t";
        $conf .= "acl = acl_204"   . " \n\t";
        $conf .= "timers = no"   . " \n\t";
        $conf .= "message_context = messages"   . " \n\t";
        $conf .= "inband_progress = yes"   . " \n\t";
        $conf .= "tone_zone = pl"   . " \n\n";









        // foreach ($sip as $key => $value) {
        //     if ($value != null && $key != 'id') {
        //         $conf .= $key.' = '.$value . PHP_EOL ."\t";
        //     }
        // }
        $conf .= PHP_EOL .PHP_EOL;

        Storage::disk('sip')->put($provider->uniqid.'.conf', $conf);
    }






    public function create_extensions_config($provider)
    {
        $conf = '' . PHP_EOL;


        $conf .= '[from'.$provider->uniqid.']' . " \n\n";

        $conf .= 'exten => _+.!,1,NoOp(Strip + sign from number)' . " \n\t";
        $conf .= 'same => n,Goto(${CONTEXT},${EXTEN:1},1)' . " \n\n";

        $conf .= 'exten => _[0-9*#+a-zA-Z][0-9*#+a-zA-Z]!,1,NoOp(Z NUMERU ${CALLERID(num)}  ${CALLERID(name)} NA NUMER: ${EXTEN}  CONTEXT ${CONTEXT} )' . " \n\t";
        $conf .= 'same => n,NoOp(${SIP_HEADER(P-Asserted-Identity)} ${SIP_HEADER(Remote-Party-ID)} )' . " \n\t";
        $conf .= 'same => n,Set(PAI=${CUT(CUT(SIP_HEADER(P-Asserted-Identity),@,1),:,2)})' . " \n\t";
        $conf .= 'same => n,Set(RPID=${CUT(CUT(SIP_HEADER(Remote-Party-ID),@,1),:,2)})' . " \n\t";
    
        $conf .= 'same => n,GoSub(sprawdz_trase,${EXTEN},1) ' . " \n\t";
        $conf .= 'same => n,GoTo(dialOUT,${EXTEN},1)' . " \n\t";
        $conf .= 'same => n,Hangup() ' . " \n\n";

        $conf .= 'exten => _48XXXXXXXXX,1,NoOp(Z NUMERU: ${CALLERID(num)}  ${CALLERID(name)} NA NUMER: ${EXTEN}  CONTEXT ${CONTEXT} )' . " \n\t";
        $conf .= 'same => n,NoOp(${SIP_HEADER(P-Asserted-Identity)} ${SIP_HEADER(Remote-Party-ID)} )' . " \n\t";
        $conf .= 'same => n,Set(PAI=${CUT(CUT(SIP_HEADER(P-Asserted-Identity),@,1),:,2)})' . " \n\t";
        $conf .= 'same => n,Set(RPID=${CUT(CUT(SIP_HEADER(Remote-Party-ID),@,1),:,2)})' . " \n\t";
    
        $conf .= 'same => n,GoSub(sprawdz_trase,${EXTEN},1) ' . " \n\t";
        $conf .= 'same => n,GoTo(dialOUT,${EXTEN},1)' . " \n\t";
        $conf .= 'same => n,Hangup() ' . " \n\n";

        $conf .= 'exten => _XXXXXXXXX,1,NoOp(Z NUMERU: ${CALLERID(num)}  ${CALLERID(name)} NA NUMER: ${EXTEN}  CONTEXT ${CONTEXT} )' . " \n\t";
        $conf .= 'same => n,NoOp(${SIP_HEADER(P-Asserted-Identity)} ${SIP_HEADER(Remote-Party-ID)} )' . " \n\t";
        $conf .= 'same => n,Set(PAI=${CUT(CUT(SIP_HEADER(P-Asserted-Identity),@,1),:,2)})' . " \n\t";
        $conf .= 'same => n,Set(RPID=${CUT(CUT(SIP_HEADER(Remote-Party-ID),@,1),:,2)})' . " \n\t";
    
        $conf .= 'same => n,GoSub(sprawdz_trase,48${EXTEN},1) ' . " \n\t";
        $conf .= 'same => n,GoTo(dialOUT,48${EXTEN},1)' . " \n\t";
        $conf .= 'same => n,Hangup() ' . " \n\n";
 
        
        $conf .= 'exten => _0X.,1,NoOp(Z NUMERU: ${CALLERID(num)}  ${CALLERID(name)} NA NUMER: ${EXTEN}  CONTEXT ${CONTEXT} )' . " \n\t";
        $conf .= 'same => n,NoOp(${SIP_HEADER(P-Asserted-Identity)} ${SIP_HEADER(Remote-Party-ID)} )' . " \n\t";
        $conf .= 'same => n,Set(PAI=${CUT(CUT(SIP_HEADER(P-Asserted-Identity),@,1),:,2)})' . " \n\t";
        $conf .= 'same => n,Set(RPID=${CUT(CUT(SIP_HEADER(Remote-Party-ID),@,1),:,2)})' . " \n\t";
    
        $conf .= 'same => n,GoSub(sprawdz_trase,48${EXTEN:1},1) ' . " \n\t";
        $conf .= 'same => n,GoTo(dialOUT,48${EXTEN:1},1)' . " \n\t";
        $conf .= 'same => n,Hangup() ' . " \n\n";
    
        $conf .= 'exten => _48X.,1,NoOp(Z NUMERU: ${CALLERID(num)}  ${CALLERID(name)} NA NUMER: ${EXTEN}  CONTEXT ${CONTEXT} )' . " \n\t";
        $conf .= 'same => n,NoOp(${SIP_HEADER(P-Asserted-Identity)} ${SIP_HEADER(Remote-Party-ID)} )' . " \n\t";
        $conf .= 'same => n,Set(PAI=${CUT(CUT(SIP_HEADER(P-Asserted-Identity),@,1),:,2)})' . " \n\t";
        $conf .= 'same => n,Set(RPID=${CUT(CUT(SIP_HEADER(Remote-Party-ID),@,1),:,2)})' . " \n\t";
    
        $conf .= 'same => n,GoSub(sprawdz_trase,${EXTEN},1) ' . " \n\t";
        $conf .= 'same => n,GoTo(dialOUT,${EXTEN},1)' . " \n\t";
        $conf .= 'same => n,Hangup() ' . " \n\n";

 

        $conf .= '['.$provider->uniqid.']' . " \n\t";
        $conf .= 'exten => _[0-9*#+a-zA-Z][0-9*#+a-zA-Z]!,1,Dial(SIP/'.$provider->uniqid.'/${EXTEN})' . " \n\t";
        $conf .= 'same => n,NoOp(Z NUMERU: ${CALLERID(num)}  ${CALLERID(name)} NA NUMER: ${EXTEN} )' . " \n\t";
        $conf .= 'same => n,Hangup()' . " \n\n";




        Storage::disk('extensions')->put($provider->uniqid.'.conf', $conf);
    }


    public function reload()
    {
        $process = new Process(['asterisk','-rx','sip reload']);
        $process->run();
        $process = new Process(['asterisk','-rx','dialplan reload']);
        $process->run();
    }

    // public function updateextenconfig()
    // {
    //     $sips = Sip::all();

    //     // dd($sips);
    //     $conf = '' . PHP_EOL;

    //     foreach ($sips as $key => $sip) {
    //         $conf .= ' ['.$sip->uniqid.'-incoming]' . PHP_EOL ."\t";
    //         $conf .= 'exten => _X.,1,NoOp(Test)' . PHP_EOL ."\t".
    //         'same => n,NoOp(Z NUMERU: ${CALLERID(num)}  ${CALLERID(name)} NA NUMER: ${EXTEN} )' . PHP_EOL ."\t".
    //         'same => n,Dial(${PJSIP_DIAL_CONTACTS(204)})' . PHP_EOL ."\t".
    //         'same => n,Hangup()' . PHP_EOL .PHP_EOL;
    //     }
 

        
    //     Storage::disk('extconfig')->put('extension-custom.conf', $conf);
    // }




    public function delete_config($trunkname)
    {
        Storage::disk('register')->delete("$trunkname.conf");
        Storage::disk('extconfig')->delete("$trunkname.conf");
        Storage::disk('sip')->delete("$trunkname.conf");
    }

    public function add_register_config($trunkname, $secret, $ip, $port = '5060')
    {
        $conf = '' . PHP_EOL;
        $conf .= "register => $trunkname:$secret@$ip:$port". PHP_EOL .PHP_EOL;
   
        Storage::disk('register')->put("$trunkname.conf", $conf);
    }


    
    public function asteriskcommand($command = 'pjsip show registrations')
    {
        $process = new Process(['asterisk','-rx',$command]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput();
    }
}
