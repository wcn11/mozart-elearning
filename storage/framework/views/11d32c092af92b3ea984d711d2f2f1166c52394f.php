<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Daftar mentor| Mozart E-learning</title>
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
        <form method="POST" action="<?php echo e(route('mentor.password.email')); ?>" aria-label="<?php echo e(__('Reset Password')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                    <?php if($errors->has('email')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary btn-kirim" style="font-size:8px;">
                        <?php echo e(__('Send Password Reset Link')); ?>

                    </button>
                </div>
            </div>
        </form>
			</div>
		</div>

		<script src="<?php echo e(asset('logreg/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('logreg/js/main.js')); ?>"></script>
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







<?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/mentor/auth/passwords/email.blade.php ENDPATH**/ ?>