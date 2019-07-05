<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Mentor</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ URL::to('loginregister/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('loginregister/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('loginregister/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('loginregister/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('loginregister/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('loginregister/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ URL::to('loginregister/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('loginregister/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('loginregister/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ URL::to('loginregister/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('loginregister/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('loginregister/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url({{ URL::to('images/mentor.jpg')}});"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
        <form method="POST" class="login100-form validate-form" action="{{ route('mentor.login') }}" aria-label="{{ __('Login') }}">
            @csrf
					<span class="login100-form-title p-b-59">
						Sign In
					</span>

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Email</span>
            <input id="email" type="email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Masukkan email" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
            <span class="label-input100">Password</span>
            <input id="password" type="password" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Masukkan password" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
						{{-- <input class="input100" type="text" name="pass" placeholder="*************"> --}}
						<span class="focus-input100"></span>
          </div>
          
          <div class="form-group">
              <div class="custom-control custom-checkbox small">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
              </div>
            </div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Sign In
							</button>
						</div>

					<a href="{{ route('mentor.register')}}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign Up
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
          </div>
          
          <div class="text-center">

              <a class="btn btn-link" href="{{ route('mentor.password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
        </div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="{{ URL::to('loginregister/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('loginregister/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('loginregister/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ URL::to('loginregister/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('loginregister/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('loginregister/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{ URL::to('loginregister/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('loginregister/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('loginregister/js/main.js')}}"></script>

</body>
</html>