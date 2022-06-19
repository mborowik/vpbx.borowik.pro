<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Extension;
use App\Models\IncomingRouting;
use App\Http\Requests\StoreIncomingRoutingRequest;
use App\Http\Requests\UpdateIncomingRoutingRequest;

class IncomingRoutingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomingroutes = IncomingRouting::with(['provider_out','provider_in'])->get();
        
        return view('incomingrouting.index', ['incomingroutes'=> $incomingroutes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::all();


        return view('incomingrouting.create', ['providers' => $providers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIncomingRoutingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomingRoutingRequest $request)
    {
        $provider_in = Provider::find($request->input('provider_id_in'));
        $provider_out = Provider::find($request->input('provider_id_out'));
        $data = $request->input();



        IncomingRouting::create($request->input());
       
        // $provider_in = Provider::where('id', $request->input('provider_id_in'))->get();
   
        print_r($provider_in->id);
        //  print_r($provider_out);

        
        
        Extension::insert([
            [
                'context' => $provider_in->uniqid,
                'exten' => $request->input('numberbeginswith'),
                'priority' => '1',
                'app' => 'Dial',
                'appdata' => 'SIP/'.$provider_out->uniqid.'/'.($data['prepend']??'').'${EXTEN'.($data['trimfrombegin']?':'.$data['trimfrombegin']:'').'}',
            ],
            [
                'context' => $provider_in->uniqid,
                'exten' => $request->input('numberbeginswith'),
                'priority' => '2',
                'app' => 'Hangup',
                'appdata' => '',
             ]]);



        return redirect()->route('incomingroutes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomingRouting  $incomingRouting
     * @return \Illuminate\Http\Response
     */
    public function show(IncomingRouting $incomingRouting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomingRouting  $incomingRouting
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomingRouting $incomingRouting)
    {
        $providers = Provider::all();

        return view('incomingrouting.edit', ['incomingRouting' => $incomingRouting,
                                                          'providers' => $providers ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIncomingRoutingRequest  $request
     * @param  \App\Models\IncomingRouting  $incomingRouting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomingRoutingRequest $request, IncomingRouting $incomingRouting)
    {
        $provider_in = Provider::find($request->input('provider_id_in'));
        $provider_out = Provider::find($request->input('provider_id_out'));

        $data = $request->input();
        Extension::where(['context'=> $incomingRouting->provider_in->uniqid,
                          'exten' => $incomingRouting->numberbeginswith,'priority' => 1])
                          ->update([
                              'context'=> $provider_in->uniqid,
                              'exten' => $data['numberbeginswith'],
                              'priority' => '1',
                              'app' => 'Dial',
                              'appdata' => 'SIP/'.$provider_out->uniqid.'/'.($data['prepend']??'').'${EXTEN'.($data['trimfrombegin']?':'.$data['trimfrombegin']:'').'}',
                            
                            ]);
        Extension::where(['context'=> $incomingRouting->provider_in->uniqid,
                          'exten' => $incomingRouting->numberbeginswith,'priority' => 2])
                          ->update([
                            'context' => $provider_in->uniqid,
                            'exten' => $request->input('numberbeginswith'),
                            'priority' => '2',
                            'app' => 'Hangup',
                            'appdata' => '',
                            ]);

 

        $incomingRouting->update($request->all());

        return redirect()->route('incomingroutes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomingRouting  $incomingRouting
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomingRouting $incomingRouting)
    {
        //  dd($incomingRouting);
        // 'context' => $provider_in->uniqid.'-incoming',
        // 'exten' => $request->input('numberbeginswith'),

        Extension::where(['context'=> $incomingRouting->provider_in->uniqid,
                          'exten' => $incomingRouting->numberbeginswith])->delete();
        $incomingRouting->delete();

        return redirect()->route('incomingroutes');
    }
}
