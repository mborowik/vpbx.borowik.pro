<?php

namespace App\Http\Controllers;

use App\Models\Sip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // $cdry = DB::connection('mysql')->table('cdr')->get();

        // return view('cdr.index', ['cdry' => $cdry]);
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
        $conf  = ""   . PHP_EOL."\t";
        $conf .= "[204]"   . PHP_EOL."\t";
        $conf .= "type = auth"   . PHP_EOL."\t";
        $conf .= "username = 204"   . PHP_EOL."\t";
        $conf .= "password = $request->secret"   . " \n\n";
        
        $conf .= "[204]"   . PHP_EOL."\t";
        $conf .= "type = aor"   . PHP_EOL."\t";
        $conf .= "qualify_frequency = 60"   . PHP_EOL."\t";
        $conf .= "qualify_timeout = 5"   . PHP_EOL."\t";
        $conf .= "max_contacts = 5"   . " \n\n";
        
        $conf .= "[204]"   . PHP_EOL."\t";
        $conf .= "type = endpoint"   . PHP_EOL."\t";
        $conf .= "context = all_peers"   . PHP_EOL."\t";
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
        $conf .= "callerid = Marcin <204>"   . PHP_EOL."\t";
        $conf .= "send_pai = yes"   . PHP_EOL."\t";
        $conf .= "call_group = 1"   . PHP_EOL."\t";
        $conf .= "pickup_group = 1"   . PHP_EOL."\t";
        $conf .= "sdp_session = mikopbx"   . PHP_EOL."\t";
        $conf .= "language = pl-pl"   . PHP_EOL."\t";
        $conf .= "mailboxes = admin@voicemailcontext"   . PHP_EOL."\t";
        $conf .= "device_state_busy_at = 1"   . PHP_EOL."\t";
        $conf .= "aors = 204"   . PHP_EOL."\t";
        $conf .= "auth = 204"   . PHP_EOL."\t";
        $conf .= "outbound_auth = 204"   . PHP_EOL."\t";
        $conf .= "acl = acl_204"   . PHP_EOL."\t";
        $conf .= "timers = no"   . PHP_EOL."\t";
        $conf .= "message_context = messages"   . PHP_EOL."\t";
        $conf .= "inband_progress = yes"   . PHP_EOL."\t";
        $conf .= "tone_zone = pl"   . " \n\n";









        // foreach ($sip as $key => $value) {
        //     if ($value != null && $key != 'id') {
        //         $conf .= $key.' = '.$value . PHP_EOL ."\t";
        //     }
        // }
        $conf .= PHP_EOL .PHP_EOL;

        Storage::disk('sip')->put('nazwafirmy.conf', $conf);
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
