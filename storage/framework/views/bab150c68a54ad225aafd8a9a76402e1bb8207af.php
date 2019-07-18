<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v4 by Colorlib</title>
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
                <form action="<?php echo e(route('master.login')); ?>" method="post">
                    <?php echo csrf_field(); ?>
					<h3>Login Master</h3>
					<div class="form-holder active">
                        <input type="text" placeholder="username" name="username" class="form-control">
                        
                        <?php if($errors->has('email')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
					</div>
					<div class="form-holder">
                        <input type="password" name="password" placeholder="Password" class="form-control" style="font-size: 15px;">
                        <?php if($errors->has('password')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
					</div>
					<div class="checkbox">
					</div>
					<div class="form-login">
						<button>Login</button>
					</div>
				</form>
			</div>
		</div>

		<script src="<?php echo e(asset('logreg/js/jquery-3.3.1.min.js')); ?>"></script>
		<script src="<?php echo e(asset('logreg/js/main.js')); ?>"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>


<?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/master/auth/login.blade.php ENDPATH**/ ?>