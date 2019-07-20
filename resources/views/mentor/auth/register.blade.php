<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Daftar mentor| Mozart E-learning</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{ asset('logreg/css/style.css')}}">
	</head>
<style>
    image-holder{
        background-image: url("http://img15.deviantart.net/cafe/i/2012/085/2/8/orange_stripe_background_by_sonnywolfie-d4u0e93.png");
        animation: moveIt 10s linear infinite;
        background-size: 261px;
    }
    @keyframes moveIt{
        from {background-position:left;}
        to {background-position:right;}
    }
</style>
	<body>

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder" style="padding: 50px;">
                    <img src="{{ url('logreg/images/admin.jpg') }}">
				</div>
                <form method="POST" action="{{ route('mentor.register') }}" aria-label="{{ __('Register') }}">
                    @csrf
					<h3>Daftar Mentor</h3>
					<div class="form-holder active">
						<input id="name" placeholder="Masukkan username" type="text" class="input100 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

						@if ($errors->has('name'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
					</div>
					<div class="form-holder">
							<input id="email" type="email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Masukkan email" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
					</div>
					<div class="form-holder">
							<input id="password" type="password" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Masukkan password" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
					</div>
					<div class="form-holder">
							<input id="password-confirm" type="password" placeholder="Password Confirmation" class="form-control" name="password_confirmation" required>
							

							@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
					</div>
					<div class="form-login" style="margin-bottom: 25px;">
						<button>Daftar</button>
						<a href="{{route('mentor.login')}}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
								Login
								<i class="fa fa-long-arrow-right m-l-5"></i>
							</a>
					</div>
				</form>
			</div>
		</div>

		<script src="{{ asset('logreg/js/jquery-3.3.1.min.js')}}"></script>
		<script src="{{ asset('logreg/js/main.js')}}"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>





