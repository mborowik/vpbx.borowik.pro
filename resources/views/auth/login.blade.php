<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ __('Login') }}</title>

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


	<div class="navbar navbar-expand-lg navbar-dark navbar-static">
		<div class="navbar-brand ml-2 ml-lg-0">
			<a href="/" class="d-inline-block">
				<img src="../../../../global_assets/images/logo_light.png" alt="">
			</a>
		</div>


	</div>




	<div class="page-content">

	
		<div class="content-wrapper">

		
			<div class="content-inner">

			
				<div class="content d-flex justify-content-center align-items-center">




				

					<form method="POST" action="{{ route('login') }}" class="login-form">
						@csrf
						
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-people icon-2x text-warning border-warning border-3 rounded-pill p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Logowanie do panelu</h5>
							
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email') }}" autofocus>
							
								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								 @enderror

								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Hasło') }}"  required autocomplete="current-password">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
							</div>

							<div class="form-group d-flex align-items-center">
								<label class="custom-control custom-checkbox">
								
									<input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									<span class="custom-control-label">  {{ __('Zapamiętaj mnie') }}</span>
								</label>

								
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"> {{ __('Zaloguj') }}</button>
							</div>


							
						</div>
					</div>
				</form>
				

				</div>
			


			
				<div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
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
			

			</div>
		

		</div>


	</div>


</body>
</html>



