@extends('layouts.app')

@section('title', 'Page Title')

@section('content')


<div class="row">
    <div class="col-lg-8">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Numeracja dla <span>{{$provider->sipuid}}</span></h5>
            </div>

            <div class="card-body">
                <form action="{{route('number.store',$provider)}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Numer:</label>
                        <input type="text" class="form-control  form-control-sm" name="number" value={{old('number')}}>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Dodaj <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
     


    </div>
</div>  


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            
@endsection
