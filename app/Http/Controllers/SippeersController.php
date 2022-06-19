<?php

namespace App\Http\Controllers;

use App\Models\Sippeers;
use App\Http\Requests\StoreSippeersRequest;
use App\Http\Requests\UpdateSippeersRequest;

class SippeersController extends Controller
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
     * @param  \App\Http\Requests\StoreSippeersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSippeersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sippeers  $sippeers
     * @return \Illuminate\Http\Response
     */
    public function show(Sippeers $sippeers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sippeers  $sippeers
     * @return \Illuminate\Http\Response
     */
    public function edit(Sippeers $sippeers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSippeersRequest  $request
     * @param  \App\Models\Sippeers  $sippeers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSippeersRequest $request, Sippeers $sippeers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sippeers  $sippeers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sippeers $sippeers)
    {
        //
    }
}
