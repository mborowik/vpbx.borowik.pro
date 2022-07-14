@extends('layouts.app')

@section('title', 'Edytuj łącze Voip')


@section('content')


<div class="row">
    <div class="col-lg-12">

        <div class="card">  
            <div class="card-header">
                <h6 class="card-title">Edytuj łącze Voip</h6>
            </div>
            
            <div class="card-body">
                

                


                <form method="POST" action="{{ route('sip.update',[$sip->id]) }}">
                    @csrf
                    @method('PATCH')
                       
                        <div class="row">
                            <div class="col-lg-12">


                                <x-forms.input type="username" label="Name" placeholder="Name" value="{{$sip->username}}" readonly="readonly"/> 
                                <x-forms.input type="secret" label="Secret"  value="{{ old('secret',$sip->secret) }}" />  
                                <x-forms.input type="contacts" label="Liczba kontaktów" value="{{ old('contacts',$sip->contacts) }}"/>
                                <x-forms.input type="call_group" label="call_group" value="{{ old('call_group',$sip->call_group) }}"/>
                                <x-forms.input type="pickup_group" label="pickup_group" value="{{ old('pickup_group',$sip->pickup_group) }}"/>

                                <x-forms.input type="context" label="Kontekst" placeholder="Kontekst" value="{{ old('context',$sip->context) }}"/>

                                <x-forms.input type="callerid" label="callerid" value=""/>

                                {{-- <x-forms.input type="description" label="Opis" placeholder="Opis"/>	 --}}

                                    {{-- <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Opis:</label>
                                        <div class="col-lg-8">
                                        <input type="text" class="form-control @error('description') is-invalid @enderror form-control-sm" placeholder="" name="description" value="{{ old('description') }}">
                                        @error('description') <span class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>    --}}
                                     {{-- varchar(40) noT NULL, --}}

                                    
                                  
                                    {{-- <legend class="font-weight-semibold">Format numeru dla połączeń przychodzących</legend>


                                    <x-forms.select type="incomingA" label="Numer A(Caller ID)"  :options="$options" selected="{{old('incomingA')}}"/> 

                                    <x-forms.select type="incomingB" label="Numer B(Destination Number)"  :options="$options" selected="{{old('incomingB')}}"/> 

                                    <legend class="font-weight-semibold">Format numeru dla połączeń Wychodzących</legend>

                                    <x-forms.select type="outgoingA" label="Numer A(Caller ID)"  :options="$options" selected="{{old('outgoingA')}}"/> 

                                    <x-forms.select type="outgoingB" label="Numer B(Destination Number)"  :options="$options" selected="{{old('outgoingB')}}"/>

                                  
                                    <x-forms.input type="name" label="Name" placeholder="Name" value="SIP-{{$uniqid}}" readonly="readonly"/>  --}}


                                            

                                    {{-- <x-forms.input type="defaultuser" label="Defaultuser"/>  --}}

                                    {{-- <x-forms.input type="fromdomain" label="Nazwa Hosta"/>  

                                    <x-forms.input type="port" label="Port"/> 
                                             --}}
{{--                                 

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">type:</label>
                                        <div class="col-lg-8">
                                      

                                        <select class="custom-select" placeholder="" name="type" value="{{ old('fullcontact') }}">
                                            <option value="friend" selected>friend</option>                                                  
                                            <option value="peer">peer</option>     
                                            <option value="user">user</option>           
                                        </select>

                                        </div>
                                    </div>     --}}

                                    
                                    
{{-- 
                                    <x-forms.input type="permit" label="Permit"/> 


                                    <x-forms.input type="deny" label="Deny"  value="0.0.0.0/0.0.0.0" />        --}}


                                        



                                    {{-- <div class="form-group row">
                                        <label class="col-form-label col-lg-3">dtmfmode:</label>
                                        <div class="col-lg-8">
                                       

                                        <select class="custom-select" placeholder="" name="dtmfmode" >
                                            <option value="rfc2833">rfc2833</option>
                                            <option value="info">info</option>        
                                            <option value="shortinfo">shortinfo</option>
                                            <option value="inband">inband</option>  
                                            <option value="auto" selected>auto</option>        
                                        </select>


                                        </div>
                                    </div>  --}}
                                            

                                            

                                    {{-- <div class="form-group row">
                                        <label class="col-form-label col-lg-3">nat:</label>
                                        <div class="col-lg-8">
                                    

                                        <select class="custom-select" placeholder="" name="nat" value="{{ old('nat') }}">
                                            <option value="yes">yes</option>
                                            <option value="no">no</option>   
                                            <option value="force_rport,comedia" selected>force_rport,comedia</option>                  
                                        </select>


                                        </div>
                                    </div> 
                                             --}}

                                            
                                    {{-- <x-forms.input type="accountcode" label="Accountcode"/>  --}}


                                        
                                            
                                    

                                                

                                            
                                    {{-- <x-forms.input type="fromdomain" label="From domain"/>  --}}
                                
                                    
                                    {{-- <x-forms.input type="fromuser" label="From user"/>  --}}
                                            
                                    {{-- <x-forms.input type="qualify" label="Qualify"/>  --}}

                                    


                                                        


                                        
{{-- 
                                <legend class="font-weight-semibold">Obszar Alarmowy</legend>

                                <livewire:search-terc :provider=null> --}}



                                
                      
                                

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
