
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>{{ config('app.name') }} | Forgot Password </title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{ asset('css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles('used by all pages)-->
		<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" style="background-image: url({{ asset('media/bg/bg-10.jpg') }}" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid bg-white" id="kt_login">
				<!--begin::Aside-->
				<div class="login-aside d-flex flex-row-auto px-lg-0 px-5 pb-sm-40 pb-lg-40 flex-grow-1" style="background-repeat:no-repeat;background-position: bottom;background-image: url({{ asset('media/svg/illustrations/login-visual-1.svg') }}">
					<!--begin::Aside Container-->
					<div class="d-flex flex-row-fluid flex-column mt-lg-30 mb-lg-0 pb-lg-0 mb-20 pb-40 mt-0 pt-15">
						<!--begin::Aside header-->
						<a href="#" class="text-center mb-10">
							<img src="{{ asset('media/logos/logo-letter-1.png') }}" class="max-h-70px" alt="" />
						</a>
						<!--end::Aside header-->
						<!--begin::Aside title-->
						<h3 class="font-weight-bolder text-center display5 pb-lg-0 pb-40">Discover Amazing Visa
						<br />with great build tools</h3>
						<!--end::Aside title-->
					</div>
					<!--end::Aside Container-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 ml-auto mr-auto">
					<!--begin::Content body-->
					<div class="d-flex flex-column-fluid flex-center mt-6 mt-lg-0">
						<!--begin::Signin-->
						<div class="login-form login-signin">
                            <!--begin::Form-->

							<form class="form" novalidate="novalidate" id="kt_login_signin_form" method="POST" action="{{ route('agent.password.email') }}">
                                {{ csrf_field() }}
								<!--begin::Title-->
								<div class="text-center pt-lg-40 mt-lg-20 pb-15">
									<h3 class="font-weight-bolder text-dark display5">Forgotten Password ?</h3>
									<p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
								</div>
								<!--end::Title-->
                                @if(Session::has('message'))
                                <p id="alert-message" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                @endif
								<!--begin::Title-->
								<!--begin::Form group-->
								<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
									<label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off" />
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
								</div>
								<!--end::Form group-->

								<!--begin::Action-->
								<div class="pb-lg-0 pb-10">
                                    <button type="submit" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Submit</button>
                                    <a href="{{ route('agent.login') }}" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancel</a>

								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
						<!--begin::Signup-->
						<div class="login-form login-signup">
							<!--begin::Form-->
							<form class="form" novalidate="novalidate" id="kt_login_signup_form">
								<!--begin::Title-->
								<div class="text-center pt-lg-30 pb-15">
									<h3 class="font-weight-bolder text-dark display5">Sign Up</h3>
									<p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
								</div>
								<!--end::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="Fullname" name="fullname" autocomplete="off" />
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="Password" name="password" autocomplete="off" />
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="Confirm password" name="cpassword" autocomplete="off" />
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="checkbox mb-0">
									<input type="checkbox" name="agree" />I Agree the
									<a href="#">terms and conditions</a>.
									<span></span></label>
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
									<button type="button" id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Submit</button>
									<button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancel</button>
								</div>
								<!--end::Form group-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signup-->
						<!--begin::Forgot-->
						<div class="login-form login-forgot">
							<!--begin::Form-->
							<form class="form" novalidate="novalidate" id="kt_login_forgot_form" action="{{ route('password.request') }}">
                                <!--begin::Title-->
                                {{ csrf_field() }}
								<div class="text-center pt-lg-40 mt-lg-20 pb-15">
									<h3 class="font-weight-bolder text-dark display5">Forgotten Password ?</h3>
									<p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
								</div>
								<!--end::Title-->
								<!--begin::Form group-->
								<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="off" />
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group d-flex flex-wrap flex-center pb-lg-0">
                                    <button type="submit" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Submit</button>
                                    <a href="{{ route('agent.login') }}" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancle</a>
								</div>
								<!--end::Form group-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Forgot-->
					</div>
					<!--end::Content body-->
					<!--begin::Content footer-->
					<div class="d-flex justify-content-lg-start justify-content-center flex-column-fluid align-items-end pb-2 pt-lg-0">
						<a href="#" class="text-primary font-weight-bolder font-size-h5">Terms</a>
						<a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">Contact Us</a>
					</div>
					<!--end::Content footer-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
		<script src="{{ asset('js/scripts.bundle.js') }}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('js/pages/custom/login/login.js') }}"></script>
        <!--end::Page Scripts-->

        <script>
            setTimeout(function() {
                $('#alert-message').fadeOut('fast');
            }, 5000); // <-- time in milliseconds
        </script>
	</body>
	<!--end::Body-->
</html>
