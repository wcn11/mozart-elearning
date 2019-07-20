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
        <form method="POST" action="{{ route('mentor.password.request') }}" aria-label="{{ __('Login') }}">
            @csrf

          
            <input type="hidden" name="token" value="{{ $token }}">
              <div class=" active">
                  <div class="form-group">
                      <input id="email" type="email" placeholder="Masukkan email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                          @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
              </div>

          
                <div class=" ">
                    <input id="password" type="password" placeholder="Masukkan password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                      <input id="password-confirm" placeholder="Konfirmasi password" type="password" class="form-control" name="password_confirmation" required>
             </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" style="font-size:8px;">
                        Reset password
                    </button>
                </div>
            </div>
        </form>
			</div>
		</div>

		<script src="{{ asset('logreg/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('logreg/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
      $(".btn-kirim").click(function(){

        if($("[name='email']").val() === ""){
          Swal.fire(
  'Gagal!',
  'Harap isi email!',
  'error'
)
        }else{
          
    Swal.fire(
  'Terkirim!',
  'Email reset password telah dikirim!',
  'success'
)
        }

      });
    </script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>










