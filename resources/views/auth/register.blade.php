<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ __('Register') }}</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../../../../global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="../../../../global_assets/js/main/jquery.min.js"></script>
	<script src="../../../../global_assets/js/main/bootstrap.bundle.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="assets/js/app.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-lg navbar-dark navbar-static">
		<div class="navbar-brand ml-2 ml-lg-0">
			<a href="index.html" class="d-inline-block">
				<img src="../../../../global_assets/images/logo_light.png" alt="">
			</a>
		</div>

		<div class="d-flex justify-content-end align-items-center ml-auto">
			<ul class="navbar-nav flex-row">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link">
						<i class="icon-lifebuoy"></i>
						<span class="d-none d-lg-inline-block ml-2">Support</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('register') }}" class="navbar-nav-link">
						<i class="icon-user-plus"></i>
						<span class="d-none d-lg-inline-block ml-2">Register</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('login') }}" class="navbar-nav-link">
						<i class="icon-user-lock"></i>
						<span class="d-none d-lg-inline-block ml-2">Login</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">




					<!-- Registration form -->
					    <form class="login-form" method="POST" action="{{ route('register') }}">
                        @csrf
						<div class="card mb-0">
							<div class="card-body">
								<div class="text-center mb-3">
									<i class="icon-plus3 icon-2x text-success border-success border-3 rounded-pill p-3 mb-3 mt-1"></i>
									<h5 class="mb-0">{{ __('Register') }}</h5>
									
								</div>

								<div class="form-group text-center text-muted content-divider">
									<span class="px-2">Your credentials</span>
								</div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
									<input id="name" type="text" name="name"  class="form-control" placeholder="{{ __('Name') }}" required autocomplete="name" autofocus>
									<div class="form-control-feedback">
										<i class="icon-user-check text-muted"></i>
									</div>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                                    </span>
                                @enderror
									
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input id="email" type="email" name="email" class="form-control" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email">
									<div class="form-control-feedback">
										<i class="icon-user-check text-muted"></i>
									</div>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                                    </span>
                                @enderror
									
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input id="password" type="password" name="password" class="form-control" placeholder="{{ __('Password') }}"  required autocomplete="password"> 
									<div class="form-control-feedback">
										<i class="icon-user-lock text-muted"></i>
									</div>
								</div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
									<input id="password-confirm" type="password"  class="form-control"  name="password_confirmation"  placeholder="{{ __('Confirm Password') }}"  required autocomplete="new-password">
									<div class="form-control-feedback">
										<i class="icon-user-lock text-muted"></i>
									</div>
								</div>


 							<button type="submit" class="btn btn-teal btn-block"> {{ __('Register') }}</button>

                             <div class="form-group text-center text-muted content-divider">
                               
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
                         


							</div>
						</div>
					</form>
					<!-- /registration form -->

				</div>
				<!-- /content area -->


				<!-- Footer -->
				<div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
					<div class="text-center d-lg-none w-100">
						<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
							<i class="icon-unfold mr-2"></i>
							Footer
						</button>
					</div>

					<div class="navbar-collapse collapse" id="navbar-footer">
						<span class="navbar-text">
							&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="https://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
						</span>

						<ul class="navbar-nav ml-lg-auto">
							<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
							<li class="nav-item"><a href="https://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
							<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
						</ul>
					</div>
				</div>
				<!-- /footer -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
