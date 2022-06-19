@extends('layouts.app')

@section('title', 'Aktywne połączenia')



@section('content')



@if ($calls)

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Aktywne połączenia</h5>
    </div>




<div class="table-responsive">
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>actionid</th>
                <th>kanał</th>
                <th>Numer źródłowy</th>
                <th>Numer docelowy</th>
                <th>Kontekst</th>
                <th>Status</th>
                <th>Czas połączenia</th>
                <th>Applicationdata</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calls as $call)

                <tr>
                    <td>{{$call['actionid']}}</td>
                    <td>{{$call['channel']}}</td>
                    <td>{{$call['calleridnum']}}</td>
                    <td>{{$call['exten']}}</td>
                    <td>{{$call['context']}}</td>
                    <td>{{$call['channelstatedesc']}}</td>
                    <td>{{$call['duration']}}</td>
                    <td>{{$call['applicationdata']}}</td>
                </tr>
                @php
              
            @endphp
            </pre>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<pre>

@else

brak połączeń
    
@endif




@endsection
