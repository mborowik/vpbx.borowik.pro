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
        $conf  = ""   . " \n\t";
        $conf .= "[204]"   . " \n\t";
        $conf .= "type = auth"   . " \n\t";
        $conf .= "username = 204"   . " \n\t";
        $conf .= "password = $request->secret"   . " \n\n";
        
        $conf .= "[204]"   . " \n\t";
        $conf .= "type = aor"   . " \n\t";
        $conf .= "qualify_frequency = 60"   . " \n\t";
        $conf .= "qualify_timeout = 5"   . " \n\t";
        $conf .= "max_contacts = 5"   . " \n\n";
        
        $conf .= "[204]"   . " \n\t";
        $conf .= "type = endpoint"   . " \n\t";
        $conf .= "context = all_peers"   . " \n\t";
        $conf .= "dtmf_mode = auto"   . " \n\t";
        $conf .= "disallow = all"   . " \n\t";
        $conf .= "allow = alaw"   . " \n\t";
        $conf .= "allow = ulaw"   . " \n\t";
        $conf .= "allow = ilbc"   . " \n\t";
        $conf .= "allow = opus"   . " \n\t";
        $conf .= "allow = h264"   . " \n\t";
        $conf .= "rtp_symmetric = yes"   . " \n\t";
        $conf .= "force_rport = yes"   . " \n\t";
        $conf .= "rewrite_contact = yes"   . " \n\t";
        $conf .= "ice_support = no"   . " \n\t";
        $conf .= "direct_media = no"   . " \n\t";
        $conf .= "callerid = Marcin <204>"   . " \n\t";
        $conf .= "send_pai = yes"   . " \n\t";
        $conf .= "call_group = 1"   . " \n\t";
        $conf .= "pickup_group = 1"   . " \n\t";
        $conf .= "sdp_session = mikopbx"   . " \n\t";
        $conf .= "language = pl-pl"   . " \n\t";
        $conf .= "mailboxes = admin@voicemailcontext"   . " \n\t";
        $conf .= "device_state_busy_at = 1"   . " \n\t";
        $conf .= "aors = 204"   . " \n\t";
        $conf .= "auth = 204"   . " \n\t";
        $conf .= "outbound_auth = 204"   . " \n\t";
        $conf .= "acl = acl_204"   . " \n\t";
        $conf .= "timers = no"   . " \n\t";
        $conf .= "message_context = messages"   . " \n\t";
        $conf .= "inband_progress = yes"   . " \n\t";
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
