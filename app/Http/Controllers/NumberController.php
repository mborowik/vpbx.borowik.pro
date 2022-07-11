<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\Provider;
use App\Models\Extension;
use AhmadMayahi\Polly\Polly;
use AhmadMayahi\Polly\Config;
use Illuminate\Support\Facades\DB;
use AhmadMayahi\Polly\Voices\Polish;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreNumberRequest;
use App\Http\Requests\StoreNumbersRequest;
use App\Http\Requests\UpdateNumberRequest;
use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\SsmlVoiceGender;
use AhmadMayahi\Polly\Voices\English\UnitedStates;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;

class NumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = (new Config())
            ->setKey('AKIAICUIKDENRY44ZFQQ')
            ->setSecret('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')
            ->setRegion('us-east-1'); // default is: us-east-1


        $polly = Polly::init($config);

        $speechFile = $polly
                        ->voiceId(Polish::Maja)
                        
                        // Ewa Maja Jacek Jan
                        // Default is MP3.
                        // Available options: asMp3(), asOgg(), asPcm(), asJson()
                        ->asMp3()
                        ->text(' Witamy .. tu centrum Venus, cieszymy się że do nas dzwonisz, nagrywamy tę rozmowę bo chcemy dać ci najlepszą jakość naszych usług.')
                        ->convert('plik.mp3');

        die();
        // https://cloud.google.com/text-to-speech/docs/voices
        
        // Polish (Poland)	Standard	pl-PL	pl-PL-Standard-A	FEMALE
        // Polish (Poland)	Standard	pl-PL	pl-PL-Standard-B	MALE
        // Polish (Poland)	Standard	pl-PL	pl-PL-Standard-C	MALE
        // Polish (Poland)	Standard	pl-PL	pl-PL-Standard-D	FEMALE
        // Polish (Poland)	Standard	pl-PL	pl-PL-Standard-E	FEMALE
        // Polish (Poland)	WaveNet	pl-PL	pl-PL-Wavenet-A	FEMALE
        // Polish (Poland)	WaveNet	pl-PL	pl-PL-Wavenet-B	MALE
        // Polish (Poland)	WaveNet	pl-PL	pl-PL-Wavenet-C	MALE
        // Polish (Poland)	WaveNet	pl-PL	pl-PL-Wavenet-D	FEMALE
        // Polish (Poland)	WaveNet	pl-PL	pl-PL-Wavenet-E	FEMALE

        putenv("GOOGLE_APPLICATION_CREDENTIALS=impactful-water-351318-084f0cbadd2e.json");



 

        $textToSpeechClient = new TextToSpeechClient();
        $name = 'pl-PL-Wavenet-A';
        $input = new SynthesisInput();
        $input->setSsml('<speak>Witam, <break time="700ms"/>tu centrum Venus,<break time="700ms"/> cieszymy się że do nas dzwonisz, nagrywamy tę rozmowę bo chcemy dać ci najlepszą jakość naszych usług. Jeśli nie chcesz być nagrywanym to oczywiście w każdym momencie możesz się rozłączyć, prosimy poczekaj chwile na linii aż połączy się z tobą pracownik</speak>');
        $voice = new VoiceSelectionParams();
        $voice->setLanguageCode('pl-PL');
        $voice->setName($name);
       

        //  $voice->setSsmlGender(SsmlVoiceGender::MALE);
        $audioConfig = new AudioConfig();
        $audioConfig->setAudioEncoding(AudioEncoding::MP3);
        //  $audioConfig->setSampleRateHertz(8000);
        $audioConfig->setVolumeGainDb(16.0);

        $resp = $textToSpeechClient->synthesizeSpeech($input, $voice, $audioConfig);
        file_put_contents($name.'.mp3', $resp->getAudioContent());
        die();
     
     
     
     
     
        return view('number.index', ['numbers' => Number::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Provider $provider)
    {
        return view('number.create', ['provider' => $provider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_multiple(Provider $provider)
    {
        return view('number.create_multiple', ['provider' => $provider]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNumberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNumberRequest $request, Provider $provider)
    {
        $validated = $request->validated();
        
        $number = $request->input('number');

        $nka = DB::table('uke_nka')
        ->where('teryt_provinceid_ab', $provider->WOJ)
        ->where('teryt_districtid_ab', $provider->POW)
        ->where('teryt_communityid_ab', $provider->GMI)
        ->where('teryt_communitytype_ab', $provider->RODZ)
        ->get();
        

       
        try {
            Number::create(['provider_uniqid' => $provider->uniqid, 'number' => $number]);
            $this->dodajkierowanie($number, $provider->uniqid);
            $this->dodajkierowaniealarmowe($number, $nka);
        } catch (\Exception  $e) {
            // print_r($e);
        }



        return redirect()->route('provider.show', $provider);
    }


    public function store_multiple(StoreNumbersRequest $request, Provider $provider)
    {
        $validated = $request->validated();

        $nka = DB::table('uke_nka')
        ->where('teryt_provinceid_ab', $provider->WOJ)
        ->where('teryt_districtid_ab', $provider->POW)
        ->where('teryt_communityid_ab', $provider->GMI)
        ->where('teryt_communitytype_ab', $provider->RODZ)
        ->get();
        


        

        $number_start =  $request->input('number_start');
        $number_end =  $request->input('number_end');

        for ($i=$number_start; $i <= $number_end; $i++) {
            $numbers[] = ['provider_uniqid' => $provider->uniqid, 'number' => $i];
            $this->dodajkierowanie($i, $provider->uniqid);
            $this->dodajkierowaniealarmowe($i, $nka);
        }
      
        

        try {
            Number::insert($numbers);
        } catch (\Exception  $e) {
            print_r($e);
        }


        return redirect()->route('provider.show', $provider);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function show(Number $number)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function edit(Number $number)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNumberRequest  $request
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNumberRequest $request, Number $number)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function destroy(Number $number)
    {
        Extension::where('context', 'sprawdz_trase')
        ->where('exten', "$number->number")
        ->delete();


        DB::table('uke_nka2phones')
        ->where('accountcode', $number->number)->delete();


        $number->delete();



        return back();
    }
    public function gen()
    {
        $a = 0;
        for ($i=0; $i < 10000 ; $i++) {
            $myRandomString = $this->generateRandomString(9);
            Extension::create(['id' => null,
                'context' => 'sprawdz_trase',
                'exten' => '48'.$myRandomString,
                'priority' => 1,
                'app' => 'GoTo',
                'appdata' =>  "SIP-2277e8b33d55e,48$myRandomString,1"
                                    
            ]);
        }
    }

    public function dodajkierowanie($number, $uniqid)
    {
        Extension::create(['id' => null,
            'context' => 'sprawdz_trase',
            'exten' => $number,
            'priority' => 1,
            'app' => 'GoTo',
            'appdata' =>  "$uniqid,$number,1"
                                
        ]);
    }

    public function dodajkierowaniealarmowe($number, $nka)
    {
        foreach ($nka as $n) {
            try {
                DB::table('uke_nka2phones')->insert([
                        'id' => null,
                        'accountcode' => $number,
                        'nr_aus' => $n->nr_aus,
                        'uke_nka_id' => $n->id,
                        'nka_fullnumber' => $n->wsn.''.$n->hex.''.$n->idl_aus.''.$n->nr_aus,

                    ]);
            } catch (\Exception  $e) {
                // return Redirect::back()->withErrors(['msg' => 'Błąd zapisu do bazy danych']);
            }
        }
    }
    public function generateRandomString($length = 9)
    {
        $characters = '123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        return $randomString;
    }
}
