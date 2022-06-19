@extends('layouts.app')

@section('title', 'Page Title')


@section('content')


<div class="row">
    <div class="col-lg-8">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Numeracja dla <span>{{$provider->sip->name}}</span></h5>
            </div>

            <div class="card-body">
                <form action="{{route('numbers.store',$provider)}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>start:</label>
                        <input type="text" class="form-control  form-control-sm number_start" name="number_start" value={{old('number_start')}}>
                    </div>

                    <div class="form-group">
                        <label>end:</label>
                        <input type="text" class="form-control  form-control-sm" name="number_end" value={{old('number_end')}}>
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



<script>


$('#number_start').formatter({
  'pattern': '{{999}}-{{999}}-{{999}}-{{9999}}',
  'persistent': true
});


</script>