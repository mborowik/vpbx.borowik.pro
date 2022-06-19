@extends('layouts.app')

@section('title', 'Połączenia')



@section('content')

					<!-- Basic datatable -->
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Połączenia</h5>
						</div>

						<div class="card-body">

						</div>

						<table class="table cdr">
							<thead>
								<tr>
									<th>Numer źródłowy</th>
									<th>Numer docelowy</th>
									<th>Czas połączenia</th>
									<th>Status</th>
									<th>Data</th>
									
								</tr>
							</thead>
							<tbody>
                                @foreach ($cdry as $cdr)
								<tr>
                                    <td>{{$cdr->src}}</td>
                                    <td>{{$cdr->dst}}</td>
                                    <td>{{$cdr->billsec}}</td>
                                    <td>{{$cdr->disposition}}</td>
                                    <td>{{$cdr->start}}</td>
		
								</tr>

                            @endforeach

                                
							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->



		



					<script>
	
							
					
					
					
						$.extend( $.fn.dataTable.defaults, {
							autoWidth: false,
							order: [[4, 'desc']],
							columnDefs: [{ 
								orderable: false,
								width: 100,
							//	targets: [ 7 ]
							}],
							dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
							language: {
								search: '<span>Szukaj:</span> _INPUT_',
								searchPlaceholder: 'Type to filter...',
								lengthMenu: '<span>Show:</span> _MENU_',
								paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
							}
						});
					
						// Apply custom style to select
						$.extend( $.fn.dataTableExt.oStdClasses, {
							"sLengthSelect": "custom-select"
						});
					
						// Basic datatable
						$('.cdr').DataTable(
						

						);
					
					
						
						</script>




@endsection
