<!DOCTYPE html>
<html lang="en">

<head>
	<base href="/">
	<meta charset="utf-8" />
	<title>{{ config('app.name') }} | Login </title>
	<meta name="description" content="Login page example" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="{{ asset('css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
</head>

<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
	<div class="d-flex flex-column flex-root">
		<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid bg-white" id="kt_login">
			<div class="login-aside d-flex flex-row-auto px-lg-0 px-5 pb-sm-40 pb-lg-40 flex-grow-1" >
				<div class="d-flex flex-row-fluid flex-column mt-lg-30 mb-lg-0 pb-lg-0 mb-20 pb-40 mt-0 pt-15">
					<a href="{{ route('admin.login') }}" class="text-center mb-10">
						<img src="{{ asset('/images/logo.png') }}" class="max-h-70px" alt="" />
					</a>
					<h3 class="font-weight-bolder text-center display5 pb-lg-0 pb-40">Discover Amazing Visa
						<br />with great build tools</h3>
				</div>
			</div>
			<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 ml-auto mr-auto">
				<div class="d-flex flex-column-fluid flex-center mt-6 mt-lg-0">
					<div class="login-form login-signin">
						<form class="form" novalidate="novalidate" id="kt_login_signin_form" method="POST" action="{{ route('admin.login.submit') }}">
							{{ csrf_field() }}
							<div class="mt-lg-10 pb-15">
								<h3 class="font-weight-bolder text-dark display5">Welcome to Visa Request</h3>
							</div>
							@if(Session::has('message'))
							<p id="alert-message" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
							@endif
							<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
								<label class="font-size-h6 font-weight-bolder text-dark">Email</label>
								<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off" />
								@if ($errors->has('email'))
								<span class="help-block">
									<strong style="color: red">{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
								<label class="font-size-h6 font-weight-bolder text-dark">Password</label>
								<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" name="password" required autocomplete="off" />
								@if ($errors->has('password'))
								<span class="help-block">
									<strong style="color: red">{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
							<div class="pb-lg-0 pb-10">
								<button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	@foreach(config('layout.resources.validate_js') as $script)
	<script src="{{ asset($script) }}" type="text/javascript"></script>
	@endforeach
	{!! JsValidator::formRequest('App\Http\Requests\Backend\LoginRequest') !!}
	<script>
		$("document").ready(function() {
			setTimeout(function() {
				$("p.alert").remove();
			}, 5000);
		});
	</script>
</body>

</html>