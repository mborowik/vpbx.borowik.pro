@extends('layouts.app')

@section('title', 'Page Title')



@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-lg-8">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Nowa zasada obsługi połączeń przychodzących</h5>
            </div>

            <div class="card-body">
                    <form method="POST" action="{{ route('incomingroutes.update',[$incomingRouting->id]) }}">
                    @csrf
                    @method('PATCH')


                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control  form-control-sm" name="rulename" value="{{ old('rulename',$incomingRouting->rulename) }}">
                    </div>


                    <div class="form-group">
                        <label>Uwaga:</label>
                        <textarea rows="4" cols="5" class="form-control  form-control-sm" name="note" value="{{ old('note',$incomingRouting->note) }}"></textarea>
                    </div>

                    <legend class="font-weight-semibold">Reguła zadziała podczas połączenia na</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Trunk</label>
                        <div class="col-lg-9">
                            <select class="form-control  form-control-sm" name="provider_id_in">

                                @foreach ($providers as $provider)

                                <option value="{{$provider->id}}" {{($incomingRouting->provider_id_in == $provider->id) ? 'selected' :''}}>{{$provider->description}} ({{$provider->sipuid}}) {{$provider->status?'':'(wył)'}}</option>
  
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <legend class="font-weight-semibold">Reguła zadziała, jeśli</legend>


                    
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Numer zaczyna się od:</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control  form-control-sm" name="numberbeginswith" value="{{ old('numberbeginswith',$incomingRouting->numberbeginswith) }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Reszta numeru składa się z określonej liczby cyfr:</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control  form-control-sm" name="restnumbers" value="{{ old('restnumbers',$incomingRouting->restnumbers) }}">
                        </div>
                    </div>

                    <legend class="font-weight-semibold">Modyfikacja numeru</legend>


                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Przed rozpoczęciem rozmowy odcinamy</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-1">
                                    <input type="text" class="form-control  form-control-sm" name="trimfrombegin" value="{{ old('trimfrombegin',$incomingRouting->trimfrombegin) }}">
                                </div>
                                <label class="col-lg-7 col-form-label"> cyfr na początku numeru, a następnie dodaj na początku</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control  form-control-sm" name="prepend" value="{{ old('prepend',$incomingRouting->prepend) }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <legend class="font-weight-semibold">Połączenie zostanie skierowane na</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Trunk</label>
                        <div class="col-lg-9">
                            <select class="form-control  form-control-sm" name="provider_id_out">

                                @foreach ($providers as $provider)

                                <option value="{{$provider->id}}" {{($incomingRouting->provider_id_out == $provider->id) ? 'selected' :''}}>{{$provider->description}} ({{$provider->sipuid}}) {{$provider->status?'':'(wył)'}}</option>
  
                                @endforeach

                            </select>
                        </div>
                    </div>
                    

 

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Zapisz <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
     


    </div>
</div>       





@endsection
