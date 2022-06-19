<?php

namespace App\Http\Controllers;

use App\Models\Sip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cdry = DB::connection('mysql')->table('cdr')->get();

        return view('cdr.index', ['cdry' => $cdry]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
}
