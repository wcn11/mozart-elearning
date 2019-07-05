<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Materi</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Murid</h6>
        </div>
        <div class="card-body">
                <div class="row">
                        <div class="row p-2">

                            <?php $__empty_1 = true; $__currentLoopData = $materi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb p-2 ">
                                    <img class="img-fluid img-thumbnail cover" src="<?php echo e(url('images/cover_materi/'.$m->cover)); ?>"
                                    alt="Another alt text">
                                    <div class="card">
                                    <p class="p-2 judul rounded"><?php echo e($m->judul_materi); ?></p>
                                    </div>
                                    <a href="<?php echo e(route('student.materi_read', $m->id)); ?>"><button class="btn btn-info w-100">Baca</button></a>
                                    
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center">
                                    <div class="container">

                                        <p>Mentor belum membuat materi.<br><em class="text-warning">atau refresh browser kamu.</em></p>
                                    </div>
                                </div>
                            <?php endif; ?> 
                        </div>
                    </div>
        </div>
    </div>
</div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.1/cropper.min.css">
<style>
.cover{
    width: 500px;
height: 278px;
}
.judul{
    white-space: nowrap;
    width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;

}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<?php if($pesan = Session::get('berhasil_mengikuti')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda berhasil mengikuti salah satu mentor!',
        'success'
    )

</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/materi.blade.php ENDPATH**/ ?>