@extends('layouts.app')

@section('title', 'Numeracja')



@section('content')


{{-- <livewire:show-peers :providers="$providers" /> --}}


<div class="row">
    <div class="col-lg-12">

				
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Numeracja</h5>
			</div>

			<div class="card-body">
			
			</div>

			<table class="table datatable-basic">


				<thead>
					<tr>
						<th>Opis</th>
						<th>Nazwa użytkownika</th>
						<th>Numer</th>
					
				


					</tr>
				</thead>
				<tbody>
					@foreach ($numbers as $number)
					<tr>
						<td>{{$number->provider->description}}</td>
						<td><a href="{{ route('provider.show',[$number->provider->id]) }}">{{$number->provider_uniqid}}</a></td>
						<td>{{$number->number}}</td>



					
						
					</tr>
					
					@endforeach
				</tbody>


			</table>
		</div>
					
	</div>
</div>

@endsection
