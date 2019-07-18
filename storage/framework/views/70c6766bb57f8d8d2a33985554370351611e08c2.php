<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar soal</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info text-center">Pilih mentor untuk melihat daftar soal</h6>
            </div>
            <div class="card-body container-utama overflow-auto" style="min-height:390px;">
                <div class="row ">

                    

                        <?php $__currentLoopData = $mentor->mentor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-md-3">
                            <?php $id = Crypt::encrypt($m->id_mentor) ?>
                                <a href="<?php echo e(route('student.soal_permentor', $id_mentor = $id, $id_param = $id)); ?>"><div class="flip-card p-2 m-2" data-toggle="tooltip" data-placement="top" title="<?php echo e($m->name); ?>">
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
                            </div>
        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
        </div>
    </div>
    
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<style>

.container-utama{
    height: auto;
}
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
<script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function(){
        $("#tabel").DataTable();
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/soal.blade.php ENDPATH**/ ?>