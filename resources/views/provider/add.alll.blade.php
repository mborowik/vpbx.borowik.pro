@extends('layouts.app')

@section('title', 'Nowy dostawca sip')


@section('content')


<div class="row">
    <div class="col-lg-12">

        <div class="card">  
            <div class="card-header">
                <h6 class="card-title">Nowy dostawca SIP</h6>
            </div>
            
            <div class="card-body">
                

                


                    <form method="POST" action="/provider">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">

                                <x-forms.input type="description" label="Opis" placeholder="Opis"/>	

                                    {{-- <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Opis:</label>
                                        <div class="col-lg-8">
                                        <input type="text" class="form-control @error('description') is-invalid @enderror form-control-sm" placeholder="" name="description" value="{{ old('description') }}">
                                        @error('description') <span class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>    --}}
                                     {{-- varchar(40) noT NULL, --}}

                                    
                                  
                                    <legend class="font-weight-semibold">Format numeru dla połączeń przychodzących</legend>


                                    <x-forms.select type="incomingA" label="Numer A(Caller ID)"  :options="$options" selected="{{old('incomingA')}}"/> 

                                    <x-forms.select type="incomingB" label="Numer B(Destination Number)"  :options="$options" selected="{{old('incomingB')}}"/> 

                                    <legend class="font-weight-semibold">Format numeru dla połączeń Wychodzących</legend>

                                    <x-forms.select type="outgoingA" label="Numer A(Caller ID)"  :options="$options" selected="{{old('outgoingA')}}"/> 

                                    <x-forms.select type="outgoingB" label="Numer B(Destination Number)"  :options="$options" selected="{{old('outgoingB')}}"/>

                                  
                                    <x-forms.input type="name" label="Name" placeholder="Name" value="SIP-{{$uniqid}}" readonly="readonly"/> 



                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">ipaddr:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="ipaddr">
                                            </div>
                                        </div>    {{-- varchar(45) DEFAULT NULL, --}}
                                                
                                               
                                        	
                                            
                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">regseconds:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="regseconds">
                                            </div>
                                        </div>    {{-- int(11) DEFAULT NULL, --}}
                                                

                                        <x-forms.input type="defaultuser" label="Defaultuser"/> 

                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">fullcontact:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="fullcontact" value="{{ old('fullcontact') }}">
                                            </div>
                                        </div>    {{-- varchar(80) DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">regserver:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="regserver">
                                            </div>
                                        </div>    {{-- varchar(20) DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">useragent:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="useragent">
                                            </div>
                                        </div>    {{-- varchar(255) DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">lastms:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="lastms">
                                            </div>
                                        </div>    {{-- int(11) DEFAULT NULL, --}}
                                                


                                        <x-forms.input type="host" label="Host"/> 

                                        <x-forms.input type="port" label="Port"/> 
                                                
                                  

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3">type:</label>
                                            <div class="col-lg-8">
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="type"> --}}

                                            <select class="custom-select" placeholder="" name="type" value="{{ old('fullcontact') }}">
                                                <option value="friend" selected>friend</option>                                                  
                                                <option value="peer">peer</option>     
                                                <option value="user">user</option>           
                                            </select>

                                            </div>
                                        </div>    {{-- enum('friend','user','peer') DEFAULT NULL, --}}
                                                

                                        <div class="form-group row" style="display:none">
                                            <label class="col-form-label col-lg-3">context:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="context" value="<?='fromSIP-'.$uniqid;?>" readonly>
                                            </div>
                                        </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                                

                                        <x-forms.input type="permit" label="Permit"/> 


                                        <x-forms.input type="deny" label="Deny"  value="0.0.0.0/0.0.0.0" />       


                                        <x-forms.input type="secret" label="Secret"  value="{{ old('secret',Str::random(16)) }}" />       


                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">md5secret:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="md5secret">
                                            </div>
                                        </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">remotesecret:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="remotesecret">
                                            </div>
                                        </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">transport:</label>
                                            <div class="col-lg-8">
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="transport"> --}}

                                            <select class="custom-select" placeholder="" name="transport">
                                                <option value="udp" selected>udp</option>
                                                <option value="tcp">tcp</option>
                                                <option value="tls">tls</option>                 
                                            </select>

                                            </div>
                                        </div>    {{-- enum('udp','tcp','tls','ws','wss','udp,tcp','tcp,udp') DEFAULT NULL, --}}
                                                

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3">dtmfmode:</label>
                                            <div class="col-lg-8">
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="dtmfmode"> --}}

                                            <select class="custom-select" placeholder="" name="dtmfmode" >
                                                <option value="rfc2833">rfc2833</option>
                                                <option value="info">info</option>        
                                                <option value="shortinfo">shortinfo</option>
                                                <option value="inband">inband</option>  
                                                <option value="auto" selected>auto</option>        
                                            </select>


                                            </div>
                                        </div>    {{-- enum('rfc2833','info','shortinfo','inband','auto') DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">directmedia:</label>
                                            <div class="col-lg-8">
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="directmedia"> --}}

                                            <select class="custom-select" placeholder="" name="directmedia">
                                                <option value="" ></option>
                                                <option value="yes">yes</option>
                                                <option value="no" selected>no</option>   
                                                <option value="nonat">nonat</option>
                                                <option value="update">update</option>
                                                <option value="outgoing">outgoing</option>                  
                                            </select>


                                            </div>
                                        </div>    {{-- enum('yes','no','nonat','update','outgoing') DEFAULT NULL, --}}
                                                

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3">nat:</label>
                                            <div class="col-lg-8">
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="nat"> --}}

                                            <select class="custom-select" placeholder="" name="nat">
                                                <option value="" ></option>
                                                <option value="yes">yes</option>
                                                <option value="no">no</option>   
                                                <option value="force_rport,comedia" selected>force_rport,comedia</option>                  
                                            </select>


                                            </div>
                                        </div>    {{-- varchar(29) DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">callgroup:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="callgroup" value="{{ old('fullcontact') }}">
                                            </div>
                                        </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">pickupgroup:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="pickupgroup" value="{{ old('fullcontact') }}">
                                            </div>
                                        </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">language:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="language" value="{{ old('fullcontact') }}">
                                            </div>
                                        </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                                

                                        <div class="form-group row" style="display:none">
                                            <label class="col-form-label col-lg-3">disallow:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="disallow" value="all">
                                            </div>
                                        </div>    {{-- varchar(200) DEFAULT NULL, --}}
                                                

                                        <div class="form-group row" style="display:none">
                                            <label class="col-form-label col-lg-3">allow:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="allow" value="ulaw,alaw">
                                            </div>
                                        </div>    {{-- varchar(200) DEFAULT NULL, --}}
                                                

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3">insecure:</label>
                                            <div class="col-lg-8">
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="insecure"> --}}
                                            <select class="custom-select" placeholder="" name="insecure">
                                                <option value="" selected></option>
                                                <option value="port">port</option>
                                                <option value="invite">invite</option>            
                                                <option value="port,invite">port,invite</option>    
                                            </select>

                                            </div>
                                        </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">trustrpid:</label>
                                            <div class="col-lg-8">
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="trustrpid"> --}}

                                            <select class="custom-select" placeholder="" name="trustrpid">
                                                <option value="yes" selected>yes</option>
                                                <option value="no">no</option>                
                                            </select>


                                            
                                            </div>
                                        </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">progressinband:</label>
                                            <div class="col-lg-8">
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="progressinband"> --}}

                                            
                                            <select class="custom-select" placeholder="" name="progressinband">
                                                <option value="" selected></option>
                                                <option value="yes">yes</option>
                                                <option value="no">no</option>   
                                                <option value="never">never</option>               
                                            </select>



                                            </div>
                                        </div>    {{-- enum('yes','no','never') DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">promiscredir:</label>
                                            <div class="col-lg-8">
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="promiscredir"> --}}

                                            <select class="custom-select" placeholder="" name="promiscredir">
                                                <option value="" selected></option>
                                                <option value="yes">yes</option>
                                                <option value="no">no</option>   
                                            </select>


                                            </div>
                                        </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">useclientcode:</label>
                                            <div class="col-lg-8">
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="useclientcode"> --}}

                                            <select class="custom-select" placeholder="" name="useclientcode">
                                                <option value="" selected></option>
                                                <option value="yes">yes</option>
                                                <option value="no">no</option>                
                                            </select>



                                            </div>
                                        </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                                
                                        <x-forms.input type="accountcode" label="Accountcode"/> 


                                            

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">setvar:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="setvar">
                                            </div>
                                        </div>    {{-- varchar(200) DEFAULT NULL, --}}
                                                
                                        <x-forms.input type="callerid" label="Callerid"/> 

                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">amaflags:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="amaflags">
                                            </div>
                                        </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">callcounter:</label>
                                            <div class="col-lg-8">
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="callcounter"> --}}

                                            <select class="custom-select" placeholder="" name="callcounter">
                                                <option value="" selected></option>
                                                <option value="yes">yes</option>
                                                <option value="no">no</option>                   
                                            </select>


                                            </div>
                                        </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">busylevel:</label>
                                            <div class="col-lg-8">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="busylevel">
                                            </div>
                                        </div>    {{-- int(11) DEFAULT NULL, --}}
                                                

                                        <div class="form-group" style="display:none">
                                            <label class="col-form-label col-lg-3">allowoverlap:</label>
                                            <div class="col-lg-8">
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="allowoverlap"> --}}

                                            <select class="custom-select" placeholder="" name="allowoverlap">
                                                <option value="" selected></option>
                                                <option value="yes">yes</option>
                                                <option value="no">no</option>               
                                            </select>


                                            </div>
                                        </div>    {{-- enum('yes','no') DEFAULT NULL, --}}


                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">allowsubscribe:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="allowsubscribe"> --}}

                                    <select class="custom-select" placeholder="" name="allowsubscribe">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>               
                                    </select>


                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">videosupport:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="videosupport"> --}}

                                    <select class="custom-select" placeholder="" name="videosupport">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>                 
                                    </select>

                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">maxcallbitrate:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="maxcallbitrate">
                                    </div>
                                </div>    {{-- int(11) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">rfc2833compensate:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="rfc2833compensate"> --}}

                                    <select class="custom-select" placeholder="" name="rfc2833compensate">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>   
                            
                                    </select>


                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">mailbox:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="mailbox">
                                    </div>
                                </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">session-timers:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="session-timers"> --}}

                                    <select class="custom-select" placeholder="" name="session-timers">
                                        <option value="" selected></option>
                                        <option value="accept">accept</option>
                                        <option value="refuse">refuse</option>   
                                        <option value="originate">originate</option>             
                                    </select>


                                    </div>
                                </div>    {{-- enum('accept','refuse','originate') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">session-expire:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="session-expires">
                                    </div>
                                </div>    {{-- int(11) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">session-minse:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="session-minse">
                                    </div>
                                </div>    {{-- int(11) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">session-refresher:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="session-refresher"> --}}

                                    
                                    <select class="custom-select" placeholder="" name="session-refresher">
                                        <option value="" selected></option>
                                        <option value="uac">uac</option>
                                        <option value="uas">uas</option>            
                                    </select>



                                    </div>
                                </div>    {{-- enum('uac','uas') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">t38pt_usertpsource:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="t38pt_usertpsource">
                                    </div>
                                </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">regexten:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="regexten">
                                    </div>
                                </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                        
                                <x-forms.input type="fromdomain" label="From domain"/> 


                              
                                
                                
                                <x-forms.input type="fromuser" label="From user"/> 
                                        
                                <x-forms.input type="qualify" label="Qualify"/> 

                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">defaultip:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="defaultip">
                                    </div>
                                </div>    {{-- varchar(45) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">rtptimeout:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="rtptimeout">
                                    </div>
                                </div>    {{-- int(11) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">rtpholdtimeout:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="rtpholdtimeout">
                                    </div>
                                </div>    {{-- int(11) DEFAULT NULL, --}}
                                        

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">sendrpid:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="sendrpid"> --}}

                                    <select class="custom-select" placeholder="" name="sendrpid">
                                        <option value="yes" selected>yes</option>
                                        <option value="no">no</option>            
                                    </select>


                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">outboundproxy:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="outboundproxy">
                                    </div>
                                </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">callbackextension:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="callbackextension">
                                    </div>
                                </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">timert1:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="timert1">
                                    </div>
                                </div>    {{-- int(11) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">timerb:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="timerb">
                                    </div>
                                </div>    {{-- int(11) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">qualifyfreq:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="qualifyfreq">
                                    </div>
                                </div>    {{-- int(11) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">constantssrc:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="constantssrc"> --}}
                                    <select class="custom-select" placeholder="" name="constantssrc">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>                   
                                    </select>

                                    </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                </div>
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">contactpermit:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="contactpermit">
                                    </div>
                                </div>    {{-- varchar(95) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">contactdeny:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="contactdeny">
                                    </div>
                                </div>    {{-- varchar(95) DEFAULT NULL, --}}
                                        

                                <div class="form-group"  style="display:none">
                                    <label class="col-form-label col-lg-3">usereqphone:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="usereqphone"> --}}

                                    <select class="custom-select" placeholder="" name="usereqphone">
                                        <option value="yes" selected>yes</option>
                                        <option value="no">no</option>                   
                                    </select>


                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">textsupport:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="textsupport"> --}}

                                    <select class="custom-select" placeholder="" name="textsupport">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>              
                                    </select>


                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">faxdetect:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="faxdetect"> --}}

                                    <select class="custom-select" placeholder="" name="faxdetect">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>                   
                                    </select>


                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">buggymwi:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="buggymwi"> --}}

                                    <select class="custom-select" placeholder="" name="buggymwi">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>               
                                    </select>


                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">auth:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="auth">
                                    </div>
                                </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">fullname:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="fullname">
                                    </div>
                                </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">trunkname:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="trunkname">
                                    </div>
                                </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">cid_number:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="cid_number">
                                    </div>
                                </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">callingpres:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="callingpres"> --}}

                                    <select class="custom-select" placeholder="" name="callingpres">
                                        <option value="" selected></option>
                                        <option value="allowed_not_screened">allowed_not_screened</option>
                                        <option value="allowed_passed_screen">allowed_passed_screen</option>
                                        <option value="allowed_failed_screen">allowed_failed_screen</option>
                                        <option value="allowed">allowed</option>
                                        <option value="prohib_not_screened">prohib_not_screened</option>
                                        <option value="prohib_passed_screen">prohib_passed_screen</option>
                                        <option value="prohib_failed_screen">prohib_failed_screen</option>
                                        <option value="prohib">prohib</option>              
                                    </select>


                                    </div>
                                </div>    {{-- enum('allowed_not_screened','allowed_passed_screen','allowed_failed_screen','allowed','prohib_not_screened','prohib_passed_screen','prohib_failed_screen','prohib') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">mohinterpret:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="mohinterpret">
                                    </div>
                                </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">mohsuggest:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="mohsuggest">
                                    </div>
                                </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">parkinglot:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="parkinglot">
                                    </div>
                                </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">hasvoicemail:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="hasvoicemail"> --}}

                                    <select class="custom-select" placeholder="" name="hasvoicemail">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>            
                                    </select>


                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">subscribemwi:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="subscribemwi"> --}}


                                    <select class="custom-select" placeholder="" name="subscribemwi">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>               
                                    </select>

                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">vmexten:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="vmexten">
                                    </div>
                                </div>    {{-- varchar(40) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">autoframing:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="autoframing"> --}}
                                    <select class="custom-select" placeholder="" name="autoframing">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>              
                                    </select>

                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">rtpkeepalive:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="rtpkeepalive">
                                    </div>
                                </div>    {{-- int(11) DEFAULT NULL, --}}
                                        

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">Limit połączeń:</label>
                                    <div class="col-lg-2">
                                    <input type="text" class="form-control @error('host') is-invalid @enderror form-control-sm" placeholder="" name="call-limit">
                                    @error('call-limit') <span class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>    {{-- int(11) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">g726nonstandard:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="g726nonstandard"> --}}
                                    <select class="custom-select" placeholder="" name="g726nonstandard">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>                    
                                    </select>

                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">ignoresdpversion:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="ignoresdpversion"> --}}

                                    <select class="custom-select" placeholder="" name="ignoresdpversion">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>                    
                                    </select>


                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">allowtransfer:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="allowtransfer"> --}}

                                    <select class="custom-select" placeholder="" name="allowtransfer">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>                  
                                    </select>


                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">dynamic:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="dynamic"> --}}
                                    <select class="custom-select" placeholder="" name="dynamic">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>                  
                                    </select>

                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">path:</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="path">
                                    </div>
                                </div>    {{-- varchar(256) DEFAULT NULL, --}}
                                        

                                <div class="form-group" style="display:none">
                                    <label class="col-form-label col-lg-3">supportpath:</label>
                                    <div class="col-lg-8">
                                    {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="supportpath"> --}}
                                    <select class="custom-select" placeholder="" name="supportpath">
                                        <option value="" selected></option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>   
                    
                                    </select>

                                    </div>
                                </div>    {{-- enum('yes','no') DEFAULT NULL, --}}
                                
                                <legend class="font-weight-semibold">Obszar Alarmowy</legend>

                                <livewire:search-terc :provider=null>



                                
                      
                                

                        </div>
                    </div>


                        <div class="d-flex justify-content-start align-items-center">
                            <a href="{{ url()->previous() }}" class="btn btn-light">Powrót do listy</a>
                            <button type="submit" class="btn btn-primary ml-3">Zapisz <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
               
            </div>


        
    </div>
</div>

</div>

            
@endsection
