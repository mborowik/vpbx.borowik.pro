@extends('layouts.app')

@section('title', 'Routing przychodzący')



@section('content')




<div class="row">
    <div class="col-lg-12">
		<a href="{{ route('incomingroutes.add') }}"><button type="button" class="btn btn-primary mb-1"><i class="icon-plus3 mr-2"></i> Dodaj regułę</button></a>
        @if (count($incomingroutes))
		
		<div class="card">
            <div class="card-header">
				
                <h6 class="card-title">Routing przychodzący</h6> 
			
            </div>

           
            
            <div class="card-body">		
					

				<table class="table datatable-basic">
					<thead>
						<tr>
							<th>Nazwa</th>
							<th>wejscie</th>
							<th>wyjscie</th>
							<th>Reguła</th>
							<th>Uwagi</th>
							<th>Status</th>	
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($incomingroutes as $routes)						

					
						<tr>
							<td>{{$routes->rulename}}</td>
							<td>{{$routes->provider_in->description}}</td>
							<td>{{$routes->provider_out->description}}</td>
							<td></td>
							<td>{{$routes->numberbeginswith}} na początku, a następnie {{$routes->restnumbers}} cyfr</td>
							<td><span class="badge badge-success">Active</span></td>
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a href="{{ route('incomingroutes.edit',['incomingRouting' => $routes->id]) }}" class="dropdown-item"><i class="icon-pencil7"></i>Edytuj</a>
												<form method="POST" action="{{ route('incomingroutes.delete',['incomingRouting' => $routes->id]) }}" class="" title="Usuń">
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






@endsection
