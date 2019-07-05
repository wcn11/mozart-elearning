<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar soal</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="text-center"><?php echo e($soal_judul->judul); ?></h5>
            <a class="btn btn-danger float-right btn-selesai text-white">Selesai</a>

            <form class="form-hasil" action="<?php echo e(route('student.soal_nilai', $soal_judul->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
            </form>

            </div>
            <input type="hidden" name="soal_judul_id" value="<?php echo e($soal_judul->id); ?>">
            <div class="card-body">

                <?php for($i = 0; $i < $soal_judul->jumlah_soal; $i++): ?>
                
                    <?php $id = Crypt::encrypt($soal[$i]['id']); $nomor = $i+1; ?>
                    
                    <?php echo e($nomor); ?>. <?php echo e($soal[$i]['pertanyaan']); ?> <br>
                    
                    <a class="btn btn-primary float-right mr-3" href="<?php echo e(route('student.soal_edit_persoal', [$id , $nomor])); ?>">edit</a>

                    <?php if($hasil[$i]['jawaban'] == 1): ?>
                        <?php echo e($soal[$i]['pilihan1']); ?> <br>
                    <?php elseif($hasil[$i]['jawaban'] == 2): ?>
                        <?php echo e($soal[$i]['pilihan2']); ?> <br>
                    <?php elseif($hasil[$i]['jawaban'] == 3): ?>
                        <?php echo e($soal[$i]['pilihan3']); ?> <br>
                    <?php elseif($hasil[$i]['jawaban'] == 4): ?>
                        <?php echo e($soal[$i]['pilihan4']); ?> <br>
                    <?php elseif($hasil[$i]['jawaban'] == 5): ?>
                        <?php echo e($soal[$i]['pilihan5']); ?> <br>
                    <?php else: ?>
                        Belum diisi
                    <?php endif; ?>
                    <div class="mt-3 invisible">kosong</div>
                    <hr>
                <?php endfor; ?>
            
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>
<script src=<?php echo e(URL::to('js/sweetalert2/dist/sweetalert2.all.min.js')); ?>></script>
<script>
    $(document).ready(function(){

        $(".btn-selesai").click(function(){
            $(".form-hasil").submit();
        });

        // $(".btn-selesai").click(function(){

        // Swal.fire({
        //     title: 'Apakah anda yakin telah selesai?',
        //     text: "Kamu tidak akan bisa kembali lagi!",
        //     type: 'warning',
        //     showCancelButton: true,
        //     confirmButtonColor: '#3085d6',
        //     cancelButtonColor: '#d33',
        //     confirmButtonText: 'Ya, selesai!'
        //     }).then((result) => {
        //         if (result.value) {
        //             Swal.fire(
        //             'Tersimpan!',
        //             'Hasil kamu telah di simpan, segera lihat atau cetak.',
        //             'success'
        //             )
        //             alert("hasi");
        //         }
        //     })
        // });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/soal_edit_semua.blade.php ENDPATH**/ ?>