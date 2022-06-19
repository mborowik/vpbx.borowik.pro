@extends('layouts.app')

@section('title', 'Edycja Łącza')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-9">
@php 
//print_r($provider->sip);
@endphp
                
        <div class="card">
            <div class="card-header">
                <h6 class="card-title"><span class="font-weight-semibold">{{$provider->description}}</span> ({{$provider->sipuid}})</h6>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('provider.update',[$provider->id]) }}">
                    @csrf
                    @method('PATCH')
                    <x-forms.input type="description" label="Opis" value="{{$provider->description}}"/> 

                    <legend class="font-weight-semibold">Format numeru dla połączeń przychodzących</legend>

                    <x-forms.select type="incomingA" label="Numer A(Caller ID)"  :options="$options" selected="{{old('incomingA',$provider->incomingA)}}"/> 

                    <x-forms.select type="incomingB" label="Numer B(Destination Number)"  :options="$options" selected="{{old('incomingB',$provider->incomingA)}}"/> 

                    <legend class="font-weight-semibold">Format numeru dla połączeń Wychodzących</legend>

                    <x-forms.select type="outgoingA" label="Numer A(Caller ID)"  :options="$options" selected="{{old('outgoingA',$provider->outgoingB)}}"/> 

                    <x-forms.select type="outgoingB" label="Numer B(Destination Number)"  :options="$options" selected="{{old('outgoingB',$provider->outgoingB)}}"/>

                 
                                                               
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Wymaga rejestracji:</label>
                        <div class="col-lg-8">
                        {{-- <input type="text" class="form-control form-control-sm" placeholder="" name="type"> --}}

                        <select class="custom-select" placeholder="" name="regserver" value="{{ old('regserver', $provider->sip->regserver) }}">
                            <option value="tak" {{($provider->sip->regserver == 'tak') ? 'selected' :''}}>Tak</option>                                                  
                            <option value="nie"  {{($provider->sip->regserver  == 'nie') ? 'selected' :''}}>Nie</option>             
                        </select>
                     
                        </div>
                    </div>        
                            
                    
                    <x-forms.input type="fromdomain" label="Nazwa Hosta" value="{{$provider->sip->fromdomain}}"/>  
                   
                    <x-forms.input type="port" label="Port" value="{{$provider->sip->port}}"/> 


                    <x-forms.input type="permit" label="Permit"  value="{{$provider->sip->permit}}"/> 
                            
                    <x-forms.input type="call-limit" label="Limit połączeń:" value="{{ $provider->sip->{'call-limit'} }}"/> 

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">nat:</label>
                            <div class="col-lg-8">
                        

                            <select class="custom-select" placeholder="" name="nat" >
                                <option value="" ></option>
                                <option value="yes">yes</option>
                                <option value="no">no</option>   
                                <option value="force_rport,comedia" selected>force_rport,comedia</option>                  
                            </select>


                            </div>
                        </div> 


                    <div class="form-group form-group-feedback form-group-feedback-right row" x-data="{ input: 'password' }">
                        <label class="col-form-label col-lg-3">Hasło:</label>
                        <div class="col-lg-8">
                        <input x-bind:type="input"  class="form-control form-control-sm" name="secret" value="{{ old('secret',$provider->sip->secret) }}">
                        <div class="form-control-feedback form-control-feedback-lg" @click="input = (input === 'password') ? 'text' : 'password'">
                            <i class="icon-eye" ></i>
                        </div>
                    </div>
                    </div>

                    <livewire:search-terc :provider="$provider">

                    <div class="d-flex justify-content-start align-items-center">
                        <a href="{{route('provider')}}">  <button type="submit" class="btn btn-light">Powrót do listy</button></a>
                        <button type="submit" class="btn btn-primary ml-3">Zapisz <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
