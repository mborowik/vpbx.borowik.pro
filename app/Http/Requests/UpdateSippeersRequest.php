<?php

namespace App\Http\Requests;

use App\Rules\Host;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSippeersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'terc'  => 'required',
            'description'  => 'required', //varchar(40) NOT NULL,
            'name'  => 'nullable', //varchar(40) NOT NULL,
            'ipaddr'  => 'nullable', //varchar(45) DEFAULT NULL,
            'port'  => 'nullable', //int(11) DEFAULT NULL,
            'regseconds'  => 'nullable', //int(11) DEFAULT NULL,
            'defaultuser'  => 'nullable', //varchar(40) DEFAULT NULL,
            'fullcontact'  => 'nullable', //varchar(80) DEFAULT NULL,
            'regserver'  => 'nullable', //varchar(20) DEFAULT NULL,
            'useragent'  => 'nullable', //varchar(255) DEFAULT NULL,
            'lastms'  => 'nullable', //int(11) DEFAULT NULL,
            'host'  => [new Host()], //varchar(40) DEFAULT NULL,
            'type'  => 'nullable', //enum('friend','user','peer') DEFAULT NULL,
            'context'  => 'nullable', //varchar(40) DEFAULT NULL,
            'permit'  => 'nullable', //varchar(95) DEFAULT NULL,
            'deny'  => 'nullable', //varchar(95) DEFAULT NULL,
            'secret'  => [Password::min(16)->mixedCase()], //varchar(40) DEFAULT NULL,
            'md5secret'  => 'nullable', //varchar(40) DEFAULT NULL,
            'remotesecret'  => 'nullable', //varchar(40) DEFAULT NULL,
            'transport'  => 'nullable', //enum('udp','tcp','tls','ws','wss','udp,tcp','tcp,udp') DEFAULT NULL,
            'dtmfmode'  => 'nullable', //enum('rfc2833','info','shortinfo','inband','auto') DEFAULT NULL,
            'directmedia'  => 'nullable', //enum('yes','no','nonat','update','outgoing') DEFAULT NULL,
            'nat'  => 'nullable', //varchar(29) DEFAULT NULL,
            'callgroup'  => 'nullable', //varchar(40) DEFAULT NULL,
            'pickupgroup'  => 'nullable', //varchar(40) DEFAULT NULL,
            'language'  => 'nullable', //varchar(40) DEFAULT NULL,
            'disallow'  => 'nullable', //varchar(200) DEFAULT NULL,
            'allow'  => 'nullable', //varchar(200) DEFAULT NULL,
            'insecure'  => 'nullable', //varchar(40) DEFAULT NULL,
            'trustrpid'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'progressinband'  => 'nullable', //enum('yes','no','never') DEFAULT NULL,
            'promiscredir'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'useclientcode'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'accountcode'  => 'nullable', //varchar(80) DEFAULT NULL,
            'setvar'  => 'nullable', //varchar(200) DEFAULT NULL,
            'callerid'  => 'nullable', //varchar(40) DEFAULT NULL,
            'amaflags'  => 'nullable', //varchar(40) DEFAULT NULL,
            'callcounter'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'busylevel'  => 'nullable', //int(11) DEFAULT NULL,
            'allowoverlap'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'allowsubscribe'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'videosupport'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'maxcallbitrate'  => 'nullable', //int(11) DEFAULT NULL,
            'rfc2833compensate'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'mailbox'  => 'nullable', //varchar(40) DEFAULT NULL,
            'session-timers'  => 'nullable', //enum('accept','refuse','originate') DEFAULT NULL,
            'session-expires'  => 'nullable', //int(11) DEFAULT NULL,
            'session-minse'  => 'nullable', //int(11) DEFAULT NULL,
            'session-refresher'  => 'nullable', //enum('uac','uas') DEFAULT NULL,
            't38pt_usertpsource'  => 'nullable', //varchar(40) DEFAULT NULL,
            'regexten'  => 'nullable', //varchar(40) DEFAULT NULL,
            'fromdomain'  => 'nullable', //varchar(40) DEFAULT NULL,
            'fromuser'  => 'nullable', //varchar(40) DEFAULT NULL,
            'qualify'  => 'nullable', //varchar(40) DEFAULT NULL,
            'defaultip'  => 'nullable', //varchar(45) DEFAULT NULL,
            'rtptimeout'  => 'nullable', //int(11) DEFAULT NULL,
            'rtpholdtimeout'  => 'nullable', //int(11) DEFAULT NULL,
            'sendrpid'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'outboundproxy'  => 'nullable', //varchar(40) DEFAULT NULL,
            'callbackextension'  => 'nullable', //varchar(40) DEFAULT NULL,
            'timert1'  => 'nullable', //int(11) DEFAULT NULL,
            'timerb'  => 'nullable', //int(11) DEFAULT NULL,
            'qualifyfreq'  => 'nullable', //int(11) DEFAULT NULL,
            'constantssrc'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'contactpermit'  => 'nullable', //varchar(95) DEFAULT NULL,
            'contactdeny'  => 'nullable', //varchar(95) DEFAULT NULL,
            'usereqphone'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'textsupport'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'faxdetect'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'buggymwi'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'auth'  => 'nullable', //varchar(40) DEFAULT NULL,
            'fullname'  => 'nullable', //varchar(40) DEFAULT NULL,
            'trunkname'  => 'nullable', //varchar(40) DEFAULT NULL,
            'cid_number'  => 'nullable', //varchar(40) DEFAULT NULL,
            'callingpres'  => 'nullable', //enum('allowed_not_screened','allowed_passed_screen','allowed_failed_screen','allowed','prohib_not_screened','prohib_passed_screen','prohib_failed_screen','prohib') DEFAULT NULL,
            'mohinterpret'  => 'nullable', //varchar(40) DEFAULT NULL,
            'mohsuggest'  => 'nullable', //varchar(40) DEFAULT NULL,
            'parkinglot'  => 'nullable', //varchar(40) DEFAULT NULL,
            'hasvoicemail'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'subscribemwi'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'vmexten'  => 'nullable', //varchar(40) DEFAULT NULL,
            'autoframing'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'rtpkeepalive'  => 'nullable', //int(11) DEFAULT NULL,
            'call-limit'  => ['nullable','numeric'], //int(11) DEFAULT NULL,
            'g726nonstandard'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'ignoresdpversion'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'allowtransfer'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'dynamic'  => 'nullable', //enum('yes','no') DEFAULT NULL,
            'path'  => 'nullable', //varchar(256) DEFAULT NULL,
            'supportpath'  => 'nullable', //enum('yes','no') DEFAULT NULL,
        ];
    }
}
