@extends('layouts.app')

@section('title', 'Nowa reguła przetwarzania połączeń wychodzących')

@section('content')



<div class="row">
    <div class="col-lg-8">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Nowa reguła przetwarzania połączeń wychodzących</h5>
            </div>

            <div class="card-body">
                <form action="{{route('outgoingroutes.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control  form-control-sm" name="rulename">
                    </div>


                    <div class="form-group">
                        <label>Uwaga:</label>
                        <textarea rows="4" cols="5" class="form-control  form-control-sm" name="note"></textarea>
                    </div>


                    

                    <legend class="font-weight-semibold">Reguła zadziała, jeśli</legend>

                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Połączenie przyjdzie z:</label>
                        <div class="col-lg-9">
                            <select class="form-control  form-control-sm" name="provider_id_in">

                                @foreach ($providers as $provider)

                                <option value="{{$provider->id}}">{{$provider->description}} ({{$provider->sipuid}}) {{$provider->status?'':'(wył)'}}</option>
  
                                @endforeach

                            </select>
                        </div>
                    </div>


                    
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Numer zaczyna się od:</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control  form-control-sm" name="numberbeginswith">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Reszta numeru składa się z określonej liczby cyfr:</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control  form-control-sm" name="restnumbers">
                        </div>
                    </div>

                    <legend class="font-weight-semibold">Modyfikacja numeru</legend>


                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Przed rozpoczęciem rozmowy odcinamy</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-1">
                                    <input type="text" class="form-control  form-control-sm" name="trimfrombegin">
                                </div>
                                <label class="col-lg-7 col-form-label"> cyfr na początku numeru, a następnie dodaj na początku</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control  form-control-sm" name="prepend">
                                </div>
                            </div>
                        </div>
                    </div>


                    <legend class="font-weight-semibold">Wyślij połączenie</legend>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">za pośrednictwem dostawcy</label>
                        <div class="col-lg-9">
                            <select class="form-control  form-control-sm" name="provider_id_out">

                                @foreach ($providers as $provider)

                                <option value="{{$provider->id}}">{{$provider->description}} ({{$provider->sipuid}}) {{$provider->status?'':'(wył)'}}</option>
  
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
