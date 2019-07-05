<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar soal</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <?php echo e($soal_judul->judul); ?>

            </div>
            <input type="hidden" name="soal_judul_id" value="<?php echo e($soal_judul->id); ?>">
            <div class="card-body">
                <?php $i = 1; ?>
                <?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($i++); ?>. <?php echo e($s->pertanyaan); ?><br>
                    Jawaban : 
                    <?php if($s->pilihan_benar == 1): ?>
                        <?php echo e($s->pilihan1); ?>

                    <?php elseif($s->pilihan_benar == 2): ?>
                        <?php echo e($s->pilihan2); ?>

                    <?php elseif($s->pilihan_benar == 3): ?>
                        <?php echo e($s->pilihan3); ?>

                    <?php elseif($s->pilihan_benar == 4): ?>
                        <?php echo e($s->pilihan4); ?>

                    <?php elseif($s->pilihan_benar == 5): ?>
                        <?php echo e($s->pilihan5); ?>

                    <?php endif; ?>
                    <button class="btn btn-primary float-right mr-3">edit</button>
                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>
<script>
    $(document).ready(function(){

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/soal_edit.blade.php ENDPATH**/ ?>