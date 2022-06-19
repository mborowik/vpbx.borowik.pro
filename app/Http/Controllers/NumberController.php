<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\Provider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreNumberRequest;
use App\Http\Requests\StoreNumbersRequest;
use App\Http\Requests\UpdateNumberRequest;
use App\Models\Extension;

class NumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    public function dodajkierowaniealarmowe($number,$nka)
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
