<?php $__env->startSection('main-content'); ?>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card">
                <div class="wrapper p-5">

                <h2 class="text-center"><?php echo e($soal_judul->judul); ?></h2>
                <h4 class="text-center">Jumlah soal : <?php echo e($soal_judul->jumlah_soal); ?></h4>
                <p class="text-center text-danger"><?php echo e($soal_judul->tanggal_mulai); ?> - <?php echo e($soal_judul->tanggal_selesai); ?> </p>
                <p class="text-capitalize text-center"><?php echo e($soal_judul->kjs_ke_mentor[0]['name']); ?></p>
                    <?php for($i = 0; $i < $soal_judul->jumlah_soal; $i++): ?>
        
                    <?php echo e($i +1); ?>. <?php echo e($soal[$i]['pertanyaan']); ?>

                    <br><br>
                        <div class="pilihan">
                            1 .<?php echo e($soal[$i]['pilihan1']); ?>

                        </div> <br>
                        <div class="pilihan">

                            2. <?php echo e($soal[$i]['pilihan2']); ?><br>
                        </div> <br>
                        <div class="pilihan">

                            3. <?php echo e($soal[$i]['pilihan3']); ?><br>
                        </div> <br>
                        <div class="pilihan">

                            4. <?php echo e($soal[$i]['pilihan4']); ?><br>
                        </div> <br>
                        <div class="pilihan">

                            5. <?php echo e($soal[$i]['pilihan5']); ?><br>
                        </div> <br>
                        <div class="pilihan">

                            Pilihan benar : <?php echo e($soal[$i]['pilihan_benar']); ?><br><br>
                        </div>
                        <hr>
                    <?php endfor; ?>
                </div>
            </div>
        </div>       
    </div> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
    <style>
    .pilihan{
        margin-left: 10px;
    }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/master/lihat_soal.blade.php ENDPATH**/ ?>