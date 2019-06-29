<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar soal</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info text-center"></h6>
            </div>
            <div class="card-body">
                    <div class="table-responsive w-100">
                            <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Judul Soal</th>
                                        <th>Jumlah Soal</th>
                                        <th>Pelajaran</th>
                                        <th>waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($soal)): ?>
                                    <tr>
                                        <td colspan="6" style="text-align:center;">Mentor belum membuat soal</td>
                                    </tr>
                                    <?php else: ?>
                                    <?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr style="text-align:center;">
                                        <td style="width: 35%; text-align:left;"><?php echo e($s->judul); ?></td>
                                        <td><?php echo e($s->jumlah_soal); ?></td>
                                        <td><?php echo e($s->pelajaran->nama_pelajaran); ?></td>

                                        <td><?php echo e($s->waktu_pengerjaan); ?></td>
                                        <td>
                                            <?php $id = Crypt::encrypt($s->id); ?>
                                            <a class="btn btn-info text-white">Kerjakan</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                        </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>
<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>"></script>
<script>
    $(document).ready(function(){
        $("#tabel").DataTable();
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/mozart-learn/resources/views/student/soal.blade.php ENDPATH**/ ?>