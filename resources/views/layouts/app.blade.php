<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../../../../global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="../../../../assets/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="../../../../global_assets/js/main/jquery.min.js"></script>
	<script src="../../../../global_assets/js/main/bootstrap.bundle.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="../../../../global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	{{-- <script src="../../../../global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script> --}}
	<script src="../../../../global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="../../../../global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="../../../../global_assets/js/plugins/notifications/sweet_alert.min.js"></script>

	<script src="../../../../assets/js/app.js"></script>
	<script src="../../../../global_assets/js/demo_pages/dashboard.js"></script>
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js"></script>
	{{-- <script src="../../../../global_assets/js/demo_charts/pages/dashboard/light/sparklines.js"></script>
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/light/lines.js"></script>	
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/light/areas.js"></script> --}}
	{{-- <script src="../../../../global_assets/js/demo_charts/pages/dashboard/light/donuts.js"></script> --}}
	{{-- <script src="../../../../global_assets/js/demo_charts/pages/dashboard/light/bars.js"></script> --}}
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/light/progress.js"></script>
	{{-- <script src="../../../../global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js"></script> --}}
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/light/pies.js"></script>
	{{-- <script src="../../../../global_assets/js/demo_charts/pages/dashboard/light/bullets.js"></script>
	<script src="../../../../global_assets/js/plugins/editors/ace/ace.js"></script> --}}
	{{-- <script src="../../../../global_assets/js/demo_pages/editor_code.js"></script> --}}
	<script src="../../../../global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="../../../../global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	
	
	{{-- <script src="../../../../global_assets/js/demo_pages/extra_sweetalert.js"></script> --}}
	<script src="../../../../global_assets/js/plugins/forms/inputs/inputmask.js"></script>
	<script src="../../../../global_assets/js/plugins/forms/inputs/formatter.min.js"></script>


	<!-- /theme JS files -->
	@livewireStyles
</head>

<body>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

			<!-- App logo and controls -->
			<div class="navbar navbar-dark bg-dark-100 navbar-static border-0">
				<div class="navbar-brand flex-fill wmin-0">
					<a href="/" class="d-inline-block">
						<img src="../../../../global_assets/images/logo_light.png" class="sidebar-resize-hide" alt="">
						<img src="../../../../global_assets/images/logo_icon_light.png" class="sidebar-resize-show" alt="">
					</a>
				</div>

				<ul class="navbar-nav align-self-center ml-auto sidebar-resize-hide">
					<li class="nav-item dropdown">
						<button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
							<i class="icon-transmission"></i>
						</button>

						<button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
							<i class="icon-cross2"></i>
						</button>
					</li>
				</ul>
			</div>
			<!-- /app logo and controls -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<div class="sidebar-section sidebar-section-body user-menu-vertical text-center">
				</div>

				{{-- <td><button type="button" class="btn btn-light" id="sweet_toast_success">Launch <i class="icon-play3 ml-2"></i></button></td> --}}
				{{-- @unless (!Auth::check())
				<!-- User menu -->
				<div class="sidebar-section sidebar-section-body user-menu-vertical text-center">
					<div class="card-img-actions d-inline-block">
						
						<div class="card-img-actions-overlay card-img rounded-circle">

							<a href="/users/{{ Auth::user()->id }}" class="btn btn-white btn-icon btn-sm rounded-pill">
								<i class="icon-pencil"></i>
							</a>
						</div>
					</div>

					<div class="sidebar-resize-hide position-relative mt-2">
						<div class="dropdown">
							<div class="cursor-pointer" data-toggle="dropdown">
					    		<h6 class="font-weight-semibold dropdown-toggle mb-0"> {{ Auth::user()->name }}</h6>
					    		<span class="d-block text-muted"> {{ Auth::user()->email }}</span>
					    	</div>

							<div class="dropdown-menu w-100">
								<a href="#" class="dropdown-item">
									<i class="icon-user-plus"></i>
									My profile
								</a>
								<a href="#" class="dropdown-item">
									<i class="icon-coins"></i>
									My balance
								</a>
								<a href="#" class="dropdown-item">
									<i class="icon-comment-discussion"></i>
									Messages
									<span class="badge badge-indigo badge-pill ml-auto">58</span>
								</a>
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item">
									<i class="icon-cog5"></i>
									Account settings
								</a>
								<a class="dropdown-item"  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
									<i class="icon-switch2"></i>
									 {{ __('Logout') }}
								</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

							</div>
				    	</div>
			    	</div>
				</div>
				<!-- /user menu -->
				@endunless --}}
				
				<!-- Main navigation -->
				<div class="sidebar-section">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header pt-0"><div class="text-uppercase font-size-xs line-height-xs">Menu</div> <i class="icon-menu" title="Main"></i></li>


						<li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link {{  request()->routeIs('dashboard*') ? 'active' : '' }}"><i class="icon-home4"></i><span>Pulpit</span></a></li>
						
						<li class="nav-item"><a href="{{ route('activecalls') }}" class="nav-link {{  request()->routeIs('activecalls*') ? 'active' : '' }}"><i class="icon-phone-wave"></i><span>Aktywne połączenia</span></a></li>
						
						<li class="nav-item"><a href="{{ route('provider') }}" class="nav-link {{  request()->routeIs('provider*') ? 'active' : '' }}"><i class="icon-tree7"></i><span>Łącza VoIP</span></a></li>
						<li class="nav-item"><a href="{{ route('outgoingroutes') }}" class="nav-link {{  request()->routeIs('outgoingroutes*') ? 'active' : '' }}"><i class="icon-phone-outgoing"></i><span>Trasy wychodzące</span></a></li>
						<li class="nav-item"><a href="{{ route('incomingroutes') }}" class="nav-link {{  request()->routeIs('incomingroutes*') ? 'active' : '' }}"><i class="icon-phone-incoming"></i><span>Trasy przychodzące</span></a></li>
						<li class="nav-item"><a href="{{ route('numbers.index') }}" class="nav-link  {{  request()->routeIs('number.index') ? 'active' : '' }}"><i class="icon-file-text2"></i><span>Numery</span></a></li>
						<li class="nav-item"><a href="{{ route('cdr') }}" class="nav-link  {{  request()->routeIs('cdr*') ? 'active' : '' }}"><i class="icon-file-text2"></i><span>CDR</span></a></li>
						<li class="nav-item"><a href="{{ route('system') }}" class="nav-link {{  request()->routeIs('system*') ? 'active' : '' }}"><i class="icon-meter-fast"></i><span>Informacje o systemie</span></a></li>					
						<!-- /layout -->
							
						
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->

{{-- 
			<!-- Service status -->
			<div class="sidebar-section sidebar-section-body sidebar-resize-hide bg-dark-100">				
                <div class="d-flex mb-2">
                	<div class="font-weight-semibold">My storage</div>
                	<span class="ml-auto">80% used</span>
				</div>
				
				<div class="progress bg-light-100 mb-1" style="height: 0.25rem;">
					<div class="progress-bar bg-warning" style="width: 80%">
						<span class="sr-only">80% Complete</span>
					</div>
				</div>
			</div>
			<!-- /service status --> --}}

		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">


				<!-- Page header -->
				<div class="page-header page-header-light">
					<div class="page-header-content header-elements-lg-inline">
						<div class="page-title d-flex">
							<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"> @yield('title') </span></h4>
							<a href="/" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
						</div>

						<div class="header-elements d-none">
							<div class="d-flex justify-content-center">
								<a href="{{ route('dashboard') }}" class="btn btn-link btn-float text-body"><i class="icon-home4 text-primary"></i><span>Pulpit</span></a>

							</div>
						</div>
					</div>

					<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
						<div class="d-flex">
							<div class="breadcrumb">

								<a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
								<a href="/" class="breadcrumb-item">@yield('title')</a>
								{{-- <span class="breadcrumb-item active">Grid</span> --}}
							</div>

							<a href="/" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
						</div>

						<div class="header-elements d-none">
							<div class="breadcrumb justify-content-center">
								<a href="/" class="breadcrumb-elements-item">
									<i class="icon-comment-discussion mr-2"></i>
									Zgłoszenia
								</a>

								<div class="breadcrumb-elements-item dropdown p-0">
									<a href="/" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
										<i class="icon-gear mr-2"></i>
										Ustawienia
									</a>

									<div class="dropdown-menu dropdown-menu-right">
										<a href="{{ route('users.show', Auth::user()->id) }}" class="dropdown-item"><i class="icon-user-lock"></i> Ustawienia konta</a>

										<div class="dropdown-divider"></div>
										{{-- <a href="/" class="dropdown-item"><i class="icon-gear"></i> All settings</a> --}}

										<a class="dropdown-item"  href="{{ route('logout') }}"
										onclick="event.preventDefault();
													  document.getElementById('logout-form').submit();">
											<i class="icon-switch2"></i>
											 {{ __('Wyloguj') }}
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>


									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /page header -->

                
                <div class="content">
				<!-- Content area -->
				<div class="content pt-0">

                    @yield('content')

				</div>
				<!-- /content area -->
            </div>

				<!-- Footer -->
				<div class="navbar navbar-expand-lg navbar-light">
					<div class="text-center d-lg-none w-100">
						<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
							<i class="icon-unfold mr-2"></i>
							Footer
						</button>
					</div>

					<div class="navbar-collapse collapse" id="navbar-footer">
						<span class="navbar-text">
							&copy; 2022. <a href="https://pbx.borowik.pro">Fmedia PBX</a> by <a href="https://pbx.borowik.pro" target="_blank">MB</a>
						</span>

					</div>
				</div>
				<!-- /footer -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

	@livewireScripts

	<script>
	
	window.addEventListener('swal',function(e){

		var swalInit = swal.mixin({
            	    buttonsStyling: false,
             	    customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
				
				
				swalInit.fire({
					text: 'Success toast message',
					icon: 'success',
					toast: true,
					showConfirmButton: false,
					position: 'top-right'
				});


		
	});
	



	$.extend( $.fn.dataTable.defaults, {
		autoWidth: false,
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
	$('.datatable-basic').DataTable();


	
	</script>
	<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
</body>
</html>
