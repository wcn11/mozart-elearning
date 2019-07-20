<?php $__env->startSection('main-content'); ?>
    
 <!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                    <p class="h3 mb-2 text-gray-1000 badge badge-pill badge-primary float-right"><?php echo e($materi->pelajaran->nama_pelajaran); ?></p>
                <h5 class="m-0 font-weight-bold text-primary text-center"><?php echo e($materi->judul_materi); ?></h5>
            </div>
            <div class="card-body">
                <?php echo $materi->materi; ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/master/baca_materi.blade.php ENDPATH**/ ?>