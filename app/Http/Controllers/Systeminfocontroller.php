<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Systeminfocontroller extends Controller
{
    public function index()
    {
        $content = PHP_EOL;
        $content .= $this->uptime();
        $content .= $this->sipshowregistry();
        $content .= $this->date();
        $content .= $this->sipshowpeers();
        $content .= $this->iptables();
        $content .= $this->coreshowchannelsverbose();
        $content .= $this->coreshowsysinfo();
        
        

        return view('system.index', ['systeminfo' => $content]);
    }


    public function uptime()
    {
        $retVal = 0;
        $outArr = [];
        
        $content = '─────────────────────────────────────── UPTIME ─────────────────────────────────────────';
        $content .= PHP_EOL . PHP_EOL;

        //   $this->mwExec("asterisk  -rx 'pjsip show endpoints' ", $out);
        exec("uptime 2>&1", $outArr, $retVal);
        
        $opensslOut = implode(PHP_EOL, $outArr);
        $content    .= $opensslOut . PHP_EOL;
        $content .= PHP_EOL . PHP_EOL;

        return $content;
    }

    public function date()
    {
        $retVal = 0;
        $outArr = [];
        $content = PHP_EOL;
        $content .= '─────────────────────────────────────── DATE ─────────────────────────────────────────';
        $content .= PHP_EOL . PHP_EOL;

        //   $this->mwExec("asterisk  -rx 'pjsip show endpoints' ", $out);
        exec("date 2>&1", $outArr, $retVal);
        
        $opensslOut = implode(PHP_EOL, $outArr);
        $content    .= $opensslOut . PHP_EOL;
        $content .= PHP_EOL . PHP_EOL;

        return $content;
    }

    public function sipshowpeers()
    {
        $retVal = 0;
        $outArr = [];
        $content = PHP_EOL;
        $content .= '─────────────────────────────────────── SIP SHOW PEERS ─────────────────────────────────────────';
        $content .= PHP_EOL . PHP_EOL;

        //   $this->mwExec("asterisk  -rx 'pjsip show endpoints' ", $out);
        exec("asterisk -rx 'sip show peers' 2>&1", $outArr, $retVal);
        
        $opensslOut = implode(PHP_EOL, $outArr);
        $content    .= $opensslOut . PHP_EOL;
        $content .= PHP_EOL . PHP_EOL;

        return $content;
    }

    public function iptables()
    {
        $retVal = 0;
        $outArr = [];
        $content = PHP_EOL;
        $content .= '─────────────────────────────────────── IFCONFIG ─────────────────────────────────────────';
        $content .= PHP_EOL . PHP_EOL;

        //   $this->mwExec("asterisk  -rx 'pjsip show endpoints' ", $out);
        exec("ifconfig 2>&1", $outArr, $retVal);
        
        $opensslOut = implode(PHP_EOL, $outArr);
        $content    .= $opensslOut . PHP_EOL;
        $content .= PHP_EOL . PHP_EOL;

        return $content;
    }


    public function coreshowchannelsverbose()
    {
        $retVal = 0;
        $outArr = [];
        $content = PHP_EOL;
        $content .= '─────────────────────────────────────── CORE SHOW CHANNELS VERBOSE ─────────────────────────────────────────';
        $content .= PHP_EOL . PHP_EOL;

        //   $this->mwExec("asterisk  -rx 'pjsip show endpoints' ", $out);
        exec("asterisk -rx 'core show channels verbose' 2>&1", $outArr, $retVal);
        
        $opensslOut = implode(PHP_EOL, $outArr);
        $content    .= $opensslOut . PHP_EOL;
        $content .= PHP_EOL . PHP_EOL;

        return $content;
    }

    public function coreshowsysinfo()
    {
        $retVal = 0;
        $outArr = [];
        $content = PHP_EOL;
        $content .= '─────────────────────────────────────── CORE SHOW SYSINFO ─────────────────────────────────────────';
        $content .= PHP_EOL . PHP_EOL;

        //   $this->mwExec("asterisk  -rx 'pjsip show endpoints' ", $out);
        exec("asterisk -rx 'core show sysinfo' 2>&1", $outArr, $retVal);
        
        $opensslOut = implode(PHP_EOL, $outArr);
        $content    .= $opensslOut . PHP_EOL;
        $content .= PHP_EOL . PHP_EOL;

        return $content;
    }

    public function sipshowregistry()
    {
        $retVal = 0;
        $outArr = [];
        $content = PHP_EOL;
        $content .= '─────────────────────────────────────── SIP SHOW REGISTRY ─────────────────────────────────────────';
        $content .= PHP_EOL . PHP_EOL;

        //   $this->mwExec("asterisk  -rx 'pjsip show endpoints' ", $out);
        exec("asterisk -rx 'sip show registry' 2>&1", $outArr, $retVal);
        
        $opensslOut = implode(PHP_EOL, $outArr);
        $content    .= $opensslOut . PHP_EOL;
        $content .= PHP_EOL . PHP_EOL;

        return $content;
    }
}
