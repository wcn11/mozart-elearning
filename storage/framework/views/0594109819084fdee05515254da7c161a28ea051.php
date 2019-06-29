<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Mentor</h1>
    <p class="mb-4">Pilih mentor utuk dapat mulai belajar</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mentor</h6>
        </div>
        <div class="card-body">
                <div class="row">
                        <div class="row">
                            <?php $__currentLoopData = $mentor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="#">
                                    <img class="img-thumbnail"
                                        src="<?php echo e(url('/images/'.$m->foto)); ?>"
                                        alt="<?php echo e($m->name); ?>">
                                </a>
                                <p class="text-center font-weight-bolder" style="color:inherit;"><?php echo e($m->name); ?></p>
                                <a href="<?php echo e(route('student.ikuti', $m->id)); ?>"><button class="btn btn-info text-center w-100">Ikuti</button></a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
        </div>
    </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/mozart-learn/resources/views/student/mentor.blade.php ENDPATH**/ ?>