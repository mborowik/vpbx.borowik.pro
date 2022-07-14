<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Http\Requests\StoreFirmRequest;
use App\Http\Requests\UpdateFirmRequest;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFirmRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFirmRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function show(Firm $firm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function edit(Firm $firm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFirmRequest  $request
     * @param  \App\Models\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFirmRequest $request, Firm $firm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Firm $firm)
    {
        //
    }
}
