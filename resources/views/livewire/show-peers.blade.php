<div class="card">
	<div class="card-header">
		<h5 class="card-title">Dostawcy telefonii</h5>
	</div>

	<div class="card-body">
		Skonfiguruj konta dla zewnętrznych połączeń przychodzących i wychodzących
	</div>


    @php //print_r($sippeers); 
	@endphp 




<table class="table datatable-select-checkbox">
	<thead>
		<tr>
			<th>Event</th>
			<th>Objectname</th>
			<th>Ipaddress</th>
			<th>Status</th>
			<th>channeltype</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($sippeers as $peers)
		<tr>
			<td>{{$peers['event']}}</td>
			<td>{{$peers['objectname']}}</td>
			<td>{{$peers['ipaddress']}}</td>
			<td>{{$peers['status']}}</td>
			<td>{{$peers['channeltype']}}</td>
		</tr>
		
		@endforeach
	</tbody>
</table>


{{-- 
<table class="table datatable-select-checkbox">
		<thead>
			<tr>
				<th></th>
				<th>Dostawca</th>
				<th>Rodzaj</th>
				<th>Host</th>
				<th>Nazwa Uzytkownika</th>
				<th>Status</th>	
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($providers as $provider)
			<tr>
				<td></td>
				<td>{{$provider->sip->description}}</td>
				<td><a href="#">{{$provider->sip->type}}</a></td>
				<td>{{$provider->sip->host}}</td>
				<td>{{$provider->sip->username}}</td>
				<td><span class="badge badge-success">Active</span></td>
				<td class="text-center">
					<div class="list-icons">
						<a href="{{ route('provider.edit',['provider' => $provider->id]) }}" class="list-icons-item"><i class="icon-pencil7"></i></a>
					</div>

		
					<form method="POST" action="{{ route('provider.delete',['provider' => $provider->id]) }}" class="form d-inline-block" title="Delete">
						@method('delete')
						@csrf
						<button type="submit" class="btn btn-sm btn-danger" title="{{ __('Delete') }}" onclick="return confirm('Are you sure want to delete?')" >Delete</button>
					</form>
				</td>
			</tr>
			
			@endforeach
		</tbody>
	</table> --}}
</div>