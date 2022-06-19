@extends('layouts.app')

@section('title', 'Routing wychodzący')

@section('content')


<div class="row">
    <div class="col-lg-12">
		<a href="{{ route('outgoingroutes.add') }}"><button type="button" class="btn btn-primary mb-1"><i class="icon-plus3 mr-2"></i> Dodaj regułę</button></a>
		@if (count($outgoingroutes))
		<div class="card">
            <div class="card-header">
				
                <h6 class="card-title">Routing wychodzący</h6> 
			
            </div>
         
            
            <div class="card-body">
				<table class="table datatable-basic">
						<thead>
							<tr>
								<th>Tutuł</th>
								<th>Wejście</th>
								<th>Wyjście</th>
								<th>Reguła</th>
								<th>Uwagi</th>
								<th class="text-center">Akcje</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($outgoingroutes as $routes)
							<tr>
								<td>{{$routes->rulename}}</td>
								<td>{{$routes->provider_in->description}} {{$routes->provider_in->status?'':'(wył)'}}</td>
								<td>{{$routes->provider_out->description}} {{$routes->provider_out->status?'':'(wył)'}}</td>
								<td>{{$routes->numberbeginswith}} na początku, a następnie {{$routes->restnumbers}} cyfr</td>
								<td>{{$routes->note}}</td>
								
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a href="{{ route('outgoingroutes.edit',['outgoingRouting' => $routes->id]) }}" class="dropdown-item"><i class="icon-pencil7"></i>Edytuj</a>
												<form method="POST" action="{{ route('outgoingroutes.delete',['outgoingRouting' => $routes->id]) }}" class="" title="Usuń">
													@method('delete')
													@csrf
													<button type="submit" class="dropdown-item" title="{{ __('Delete') }}" onclick="return confirm('Are you sure want to delete?')" ><i class="icon-trash"></i>Usuń</button>
												</form>
											</div>
										</div>
									</div>
								</td>

							</tr>
							
							@endforeach
						</tbody>
					</table>
			</div>
		</div>
		@else
					
		@endif
	</div>
</div>


								
{{-- <td class="text-center">
	<div class="list-icons">
		<a href="{{ route('outgoingroutes.edit',['outgoingRouting' => $routes->id]) }}" class="list-icons-item"><i class="icon-pencil7"></i></a>
	</div>



</td> --}}






@endsection
