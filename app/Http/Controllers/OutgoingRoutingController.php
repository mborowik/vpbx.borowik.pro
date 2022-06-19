<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\OutgoingRouting;
use App\Http\Requests\StoreOutgoingRoutingRequest;
use App\Http\Requests\UpdateOutgoingRoutingRequest;

class OutgoingRoutingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outgoingroutes = OutgoingRouting::all();
        return view('outgoingrouting.index', ['outgoingroutes' => $outgoingroutes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::all();

        return view('outgoingrouting.create', ['providers' => $providers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOutgoingRoutingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOutgoingRoutingRequest $request)
    {
        OutgoingRouting::create($request->input());

        return redirect()->route('outgoingroutes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OutgoingRouting  $outgoingRouting
     * @return \Illuminate\Http\Response
     */
    public function show(OutgoingRouting $outgoingRouting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OutgoingRouting  $outgoingRouting
     * @return \Illuminate\Http\Response
     */
    public function edit(OutgoingRouting $outgoingRouting)
    {
        $providers = Provider::all();

        return view('outgoingrouting.edit', ['outgoingRouting' => $outgoingRouting,
                                                          'providers' => $providers ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOutgoingRoutingRequest  $request
     * @param  \App\Models\OutgoingRouting  $outgoingRouting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutgoingRoutingRequest $request, OutgoingRouting $outgoingRouting)
    {
        $outgoingRouting->update($request->all());

        return redirect()->route('outgoingroutes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OutgoingRouting  $outgoingRouting
     * @return \Illuminate\Http\Response
     */
    public function destroy(OutgoingRouting $outgoingRouting)
    {
        $outgoingRouting->delete();

        return redirect()->route('outgoingroutes');
    }
}
