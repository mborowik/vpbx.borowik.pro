<?php

namespace App\Http\Controllers;

use App\Models\Psauths;
use App\Models\Sip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;

class SipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sips = Sip::all();

        return view('sip.index', ['sips' => $sips]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sip.add', ['uniqid' => uniqid(),'options'=> SIP::$options]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        
        Sip::create($request->input());
     

         $sips =  Sip::all();
       
       
        $conf = $this->genconfig($sips);

        $test =  Storage::disk('sip')->put($request->context.'.conf', $conf);
        
      
        $this->reload();

        return redirect()->route('sip');


    }


    public function reload()
    {
        $process = new Process(['asterisk','-rx','pjsip reload']);
        $process->run();
        $process = new Process(['asterisk','-rx','dialplan reload']);
        $process->run();
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sip  $sip
     * @return \Illuminate\Http\Response
     */
    public function show(Sip $sip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sip  $sip
     * @return \Illuminate\Http\Response
     */
    public function edit(Sip $sip)
    {
        return view('sip.edit', ['sip' => $sip]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sip  $sip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sip $sip)
    {

        $sip->update($request->all());

        $sips = Sip::all();

        $conf = $this->genconfig($sips);
        
        $test =  Storage::disk('sip')->put($request->context.'.conf', $conf);
        
      
        $this->reload();

        return redirect()->route('sip');



        return redirect()->route('sip');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sip  $sip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sip $sip)
    {
        //
    }


    public function genconfig($sips)
    {
        $conf  = ""   . PHP_EOL."\t";

        foreach ($sips as $key => $sip) {
     
 
         
         $conf .= "[$sip->username]"   . PHP_EOL."\t";
         $conf .= "type = auth"   . PHP_EOL."\t";
         $conf .= "username = $sip->username"   . PHP_EOL."\t";
         $conf .= "password = $sip->secret"   . " \n\n";
         
         $conf .= "[$sip->username]"   . PHP_EOL."\t";
         $conf .= "type = aor"   . PHP_EOL."\t";
         $conf .= "qualify_frequency = 60"   . PHP_EOL."\t";
         $conf .= "qualify_timeout = 5"   . PHP_EOL."\t";
         $conf .= "max_contacts = $sip->contacts"   . " \n\n";
         
         $conf .= "[$sip->username]"   . PHP_EOL."\t";
         $conf .= "type = endpoint"   . PHP_EOL."\t";
         $conf .= "context = $sip->context"   . PHP_EOL."\t";
         $conf .= "dtmf_mode = auto"   . PHP_EOL."\t";
         $conf .= "disallow = all"   . PHP_EOL."\t";
         $conf .= "allow = alaw"   . PHP_EOL."\t";
         $conf .= "allow = ulaw"   . PHP_EOL."\t";
         $conf .= "allow = ilbc"   . PHP_EOL."\t";
         $conf .= "allow = opus"   . PHP_EOL."\t";
         $conf .= "allow = h264"   . PHP_EOL."\t";
         $conf .= "rtp_symmetric = yes"   . PHP_EOL."\t";
         $conf .= "force_rport = yes"   . PHP_EOL."\t";
         $conf .= "rewrite_contact = yes"   . PHP_EOL."\t";
         $conf .= "ice_support = no"   . PHP_EOL."\t";
         $conf .= "direct_media = no"   . PHP_EOL."\t";
         $conf .= "callerid = $sip->callerid"   . PHP_EOL."\t";
         $conf .= "send_pai = yes"   . PHP_EOL."\t";
         $conf .= "call_group = $sip->call_group"   . PHP_EOL."\t";
         $conf .= "pickup_group = $sip->pickup_group"   . PHP_EOL."\t";
         $conf .= "sdp_session = borowikpro"   . PHP_EOL."\t";
         $conf .= "language = pl-pl"   . PHP_EOL."\t";
         $conf .= "mailboxes = admin@voicemailcontext"   . PHP_EOL."\t";
         $conf .= "device_state_busy_at = 1"   . PHP_EOL."\t";
         $conf .= "aors = $sip->username"   . PHP_EOL."\t";
         $conf .= "auth = $sip->username"   . PHP_EOL."\t";
         $conf .= "outbound_auth = $sip->username"   . PHP_EOL."\t";
         $conf .= "acl = acl_204"   . PHP_EOL."\t";
         $conf .= "timers = no"   . PHP_EOL."\t";
         $conf .= "message_context = messages"   . PHP_EOL."\t";
         $conf .= "inband_progress = yes"   . PHP_EOL."\t";
         $conf .= "tone_zone = pl"   . " \n\n";
 
 
 
         $conf .= PHP_EOL .PHP_EOL;
 
 
        }

        return $conf;
 
    }
}
