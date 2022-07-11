@extends('layouts.app')

@section('title', 'Łącza Voip')



@section('content')


{{-- <livewire:show-peers :providers="$providers" /> --}}


<div class="row">
    <div class="col-lg-12">

				
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Łącza Voip</h5>
			</div>

			<div class="card-body">
				<a href="{{ route('provider.add') }}"><button type="button" class="btn btn-primary mb-1"><i class="icon-plus3 mr-2"></i> Dodaj łącze voip</button></a>
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
					@foreach ($providers as $provider)
					<tr>
					
						<td><a href="{{ route('provider.show',[$provider->id]) }}">{{$provider->description}}</a></td>
						<td>{{$provider->sip->regserver}} </td>
						<td>{{@$provider->sip->fromdomain}}</td>
						<td>{{@count($provider->numbers)}}</td>
						<td>{{@$provider->sip->name}}</td>
						<td>{{@$sip[$provider->sipuid]['status']}}</td>
						<td class="text-center">
							<div class="list-icons">

								<a href="{{ route('provider.edit',['provider' => $provider->id]) }}" class="btn btn-icon ml-2"><i class="icon-pencil7"></i></a>
								
								


							
								<form method="POST" action="{{ route('provider.delete',['provider' => $provider->id]) }}" class="form d-inline-block" title="Delete">
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




				
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Style combinations</h5>
						</div>

						<div class="card-body">
							The <code>DataTables</code> is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table. DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function. Searching, ordering, paging etc goodness will be immediately added to the table, as shown in this example. <strong>Datatables support all available table styling.</strong>
						</div>

						<table class="table datatable-basic table-bordered table-striped table-hover">
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
								@foreach ($providers as $provider)
								<tr>
								
									<td><a href="{{ route('provider.show',[$provider->id]) }}">{{$provider->description}}</a></td>
									<td>{{$provider->sip->regserver}} </td>
									<td>{{@$provider->sip->fromdomain}}</td>
									<td>
									
										@foreach ($provider->numbers as $number)
											{{$number->number}} <br />
										@endforeach

									</td>
									<td>{{@$provider->sip->name}}</td>
									<td>{{@$sip[$provider->sipuid]['status']}}</td>
		
									<td class="text-center">
										<div class="list-icons">
											<div class="dropdown">
												<a href="#" class="list-icons-item" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<div class="dropdown-menu dropdown-menu-right">
													<a href="{{ route('provider.edit',['provider' => $provider->id]) }}" class="dropdown-item"><i class="icon-pencil7"></i>Edytuj</a>
												
													<form method="POST" action="{{ route('provider.delete',['provider' => $provider->id]) }}" class="form d-inline-block" title="Delete">
														@method('delete')
														@csrf
														
														<button type="submit" class="form d-inline-block" onclick="return confirm('Czy napewno chcesz usunąć?')" ><i class="icon-trash"></i></button>
														
													</form>

												
													<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
												</div>
											</div>
										</div>
									</td>
			
									
								</tr>
								
								@endforeach
								
							</tbody>
						</table>
					</div>
				
@endsection
										{{-- <div class="list-icons">
			
											<a href="{{ route('provider.edit',['provider' => $provider->id]) }}" class="btn btn-icon ml-2"><i class="icon-pencil7"></i></a>
											
											
			
			
										

										</div> --}}