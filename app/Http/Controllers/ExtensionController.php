<?php

namespace App\Http\Controllers;

use App\Models\Extension;
use App\Http\Requests\StoreExtensionRequest;
use App\Http\Requests\UpdateExtensionRequest;

class ExtensionController extends Controller
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
     * @param  \App\Http\Requests\StoreExtensionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExtensionRequest $request)
    {
        $dane =  ['deny' => '0.0.0.0/0.0.0.0',
       'secret' => 'f225e293fcbe61dcd3d1745d7673871f',
       'dtmfmode' => 'rfc2833',
       #canreinvite=no
       'context' => 'from-internal',
       'host' => 'dynamic',
       'defaultuser' => '',
       'trustrpid' => 'yes',
       'sendrpid' => 'pai',
       'type' => 'friend',
       'session-timers' => 'accept',
       'nat' => 'force_rport,comedia',
       'port' => '5060',
       'qualify' => 'yes',
       'qualifyfreq' => '60',
       'transport' => 'udp',
        # avpf=no
       # force_avp=no
        #icesupport=no
        #rtcp_mux=no
      #  encryption=no
       # namedcallgroup=
       # namedpickupgroup=
       # dial=SIP/1000
       'accountcode' => '',
       'permit' => '0.0.0.0/0.0.0.0',
       'callerid' => 'Marcin <1000>',
       # recordonfeature=apprecord
       # recordofffeature=apprecord
       'callcounter' => 'yes',
       'faxdetect' => 'no',
       # cc_monitor_policy=generic
       'language' => 'pl'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function show(Extension $extension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function edit(Extension $extension)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExtensionRequest  $request
     * @param  \App\Models\Extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExtensionRequest $request, Extension $extension)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extension $extension)
    {
        //
    }
}
