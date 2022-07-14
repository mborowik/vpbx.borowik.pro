@extends('layouts.app')

@section('title', 'Łącza Voip')



@section('content')



<div class="row">
    <div class="col-lg-12">

				
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Łącza Voip</h5>
			</div>

			<div class="card-body">
				<a href="{{ route('sip.add') }}"><button type="button" class="btn btn-primary mb-1"><i class="icon-plus3 mr-2"></i> Dodaj konto voip</button></a>
			</div>



			
			<table class="table table-xxs datatable-basic">


				<thead>
					<tr>
					
						<th>Dostawca</th>
						<th>Rejestracja</th>
						<th>Nazwa Hosta</th>
						<th>Numeracja</th>
				    	<th>Nazwa użytkownika</th>
						<th>Status</th>	
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($sips as $sip)
					<tr>
					
						<td><a href="{{ route('provider.show',[$sip->username]) }}">{{$sip->username}}</a></td>
						<td>{{$sip->username}} </td>

						<td class="text-center">
							<div class="list-icons">

								<a href="{{ route('sip.edit',['sip' => $sip->id]) }}" class="btn btn-icon ml-2"><i class="icon-pencil7"></i></a>
								
								


							
								<form method="POST" action="{{ route('sip.delete',['sip' => $sip->id]) }}" class="form d-inline-block" title="Delete">
									@method('delete')
									@csrf
									
									<button type="submit" class="btn btn-icon ml-2" onclick="return confirm('Czy napewno chcesz usunąć?')" ><i class="icon-trash"></i></button>
									
								</form>
							</div>

				

						</td>
					</tr>
					
					@endforeach
				</tbody>


			</table>
		</div>
					
	</div>
</div>




				

				
@endsection
				