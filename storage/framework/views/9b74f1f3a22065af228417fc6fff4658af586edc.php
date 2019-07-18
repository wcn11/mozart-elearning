<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mentor yang anda ikuti</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pilih mentor untuk melihat daftar materi</h6>
        </div>
        <div class="card-body container-utama overflow-auto" style="min-height:390px;">
            <div class="row ">
                <?php $__currentLoopData = $std; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <a href="<?php echo e(route('student.daftar_materi', $m->id_mentor)); ?>"><div class="flip-card p-2 m-2" data-toggle="tooltip" data-placement="top" title="<?php echo e($m->name); ?>">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img class="rounded" src="<?php echo e(url('/images/'.$m->foto)); ?>" alt="<?php echo e($m->name); ?>" style="width:100%;height:100%;">
                                
                                <div class="nama bg-white rounded" style="width:88%;">
                                    <p class="text-dark text-capitalize text-left m-2"><?php echo e($m->name); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                    

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
</div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.1/cropper.min.css">
<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<style>

    .nama {
        position: absolute;
        bottom: 8px;
        left: 16px;
    }
    .badge-keterangan{
        position: absolute;
        bottom: 25%;
    }
    
    .flip-card {
        background-color: transparent;
        width: 300px;
        height: 300px;
        perspective: 1000px;
    }
    
    .flip-card-inner {
        position: relative;
        width: 90%;
        height: 90%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }
    
    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
    }
    
    .flip-card-front {
        background-color: #bbb;
        color: black;
    }
    
    .flip-card-back {
        background-color: #2980b9;
        color: white;
        transform: rotateY(180deg);
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>

<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
$(document).ready(function() {
    $('#tabel').DataTable();
} );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/materi.blade.php ENDPATH**/ ?>