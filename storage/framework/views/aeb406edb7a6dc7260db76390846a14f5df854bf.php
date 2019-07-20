<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Daftar Student| Mozart E-learning</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('logreg/css/style.css')); ?>">
	</head>
<style>
    image-holder{
        background-image: url("http://img15.deviantart.net/cafe/i/2012/085/2/8/orange_stripe_background_by_sonnywolfie-d4u0e93.png");
        animation: moveIt 10s linear infinite;
        background-size: 261px;
    }
    @keyframes  moveIt{
        from {background-position:left;}
        to {background-position:right;}
    }
</style>
	<body>

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder" style="padding: 50px;">
                    <img src="<?php echo e(url('logreg/images/admin.jpg')); ?>">
				</div>
                <form method="POST" action="<?php echo e(route('mentor.register')); ?>" aria-label="<?php echo e(__('Register')); ?>">
                    <?php echo csrf_field(); ?>
					<h3>Daftar Student</h3>
					<div class="form-holder active">
						<input id="name" placeholder="Masukkan username" type="text" class="input100 form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

						<?php if($errors->has('name')): ?>
							<span class="invalid-feedback" role="alert">
								<strong><?php echo e($errors->first('name')); ?></strong>
							</span>
						<?php endif; ?>
					</div>
					<div class="form-holder">
							<input id="email" type="email" class="input100 form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="Masukkan email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

            <?php if($errors->has('email')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
					</div>
					<div class="form-holder">
							<input id="password" type="password" class="input100 form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Masukkan password" name="password" required>

            <?php if($errors->has('password')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
					</div>
					<div class="form-holder">
							<input id="password-confirm" type="password" placeholder="Password Confirmation" class="form-control" name="password_confirmation" required>
							

							<?php if($errors->has('password')): ?>
								<span class="invalid-feedback" role="alert">
									<strong><?php echo e($errors->first('password')); ?></strong>
								</span>
							<?php endif; ?>
					</div>
					<div class="form-login" style="margin-bottom: 25px;">
						<button>Daftar</button>
						<a href="<?php echo e(route('mentor.login')); ?>" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
								Login
								<i class="fa fa-long-arrow-right m-l-5"></i>
							</a>
					</div>
				</form>
			</div>
		</div>

		<script src="<?php echo e(asset('logreg/js/jquery-3.3.1.min.js')); ?>"></script>
		<script src="<?php echo e(asset('logreg/js/main.js')); ?>"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>







<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up | Student</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo e(URL::to('loginregister/images/icons/favicon.ico')); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('loginregister/vendor/bootstrap/css/bootstrap.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('loginregister/fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('loginregister/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('loginregister/fonts/iconic/css/material-design-iconic-font.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('loginregister/vendor/animate/animate.css')); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('loginregister/vendor/css-hamburgers/hamburgers.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('loginregister/vendor/animsition/css/animsition.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('loginregister/vendor/select2/select2.min.css')); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('loginregister/vendor/daterangepicker/daterangepicker.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('loginregister/css/util.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('loginregister/css/main.css')); ?>">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url(<?php echo e(URL::to('images/student.jpg')); ?>);"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
        <form method="POST" action="<?php echo e(route('student.register')); ?>" aria-label="<?php echo e(__('Register')); ?>">
            <?php echo csrf_field(); ?>
					<span class="login100-form-title p-b-59">
						Sign Up
          </span>
          

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Username</span>
            <input id="name" placeholder="Masukkan username" type="text" class="input100 form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

            <?php if($errors->has('name')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
            <?php endif; ?>
						<span class="focus-input100"></span>
          </div>
					<div class="wrap-input100 validate-input" data-validate="Email is required">
						<span class="label-input100">Email</span>
            <input id="email" type="email" class="input100 form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="Masukkan email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

            <?php if($errors->has('email')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
            <span class="label-input100">Password</span>
            <input id="password" type="password" class="input100 form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Masukkan password" name="password" required>

            <?php if($errors->has('password')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
						
						<span class="focus-input100"></span>
          </div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
            <span class="label-input100">Password</span>
            <input id="password-confirm" type="password" placeholder="Password Confirmation" class="form-control" name="password_confirmation" required>

            
						<span class="focus-input100"></span>
          </div>
          
          <div class="form-group">
              <div class="custom-control custom-checkbox small">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                    <label class="form-check-label" for="remember">
                        <?php echo e(__('Remember Me')); ?>

                    </label>
              </div>
            </div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Sign Up
							</button>
						</div>

          <a href="<?php echo e(route('student.login')); ?>" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign In
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
          </div>
          
          <div class="text-center">

              <a class="btn btn-link" href="<?php echo e(route('student.password.request')); ?>">
                  <?php echo e(__('Forgot Your Password?')); ?>

              </a>
        </div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="<?php echo e(URL::to('loginregister/vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(URL::to('loginregister/vendor/animsition/js/animsition.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(URL::to('loginregister/vendor/bootstrap/js/popper.js')); ?>"></script>
	<script src="<?php echo e(URL::to('loginregister/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(URL::to('loginregister/vendor/select2/select2.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(URL::to('loginregister/vendor/daterangepicker/moment.min.js')); ?>"></script>
	<script src="<?php echo e(URL::to('loginregister/vendor/daterangepicker/daterangepicker.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(URL::to('loginregister/vendor/countdowntime/countdowntime.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(URL::to('loginregister/js/main.js')); ?>"></script>

</body>
</html><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/auth/register.blade.php ENDPATH**/ ?>