<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar soal</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="text-center"><?php echo e($soal_judul->judul); ?></h5>
                Soal akan berakhir pada : <span class="text-danger"><?php echo e($soal_judul->tanggal_selesai); ?></span>
            <button class="btn btn-danger float-right btn-selesai text-white">Selesai</button>
            <?php $id_url = Crypt::encrypt($soal_judul->kode_judul_soal); $id_param = $id_url;?>
            <form class="form-hasil" action="<?php echo e(route('student.soal_nilai', [$id_url, $id_param])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id_url" value="<?php echo e($id_url); ?>">
            </form>

            </div>
            <input type="hidden" name="soal_judul_id" value="<?php echo e($soal_judul->kode_judul_soal); ?>">
            <div class="card-body">

                <?php for($i = 0; $i < $soal_judul->jumlah_soal; $i++): ?>
                
                    <?php $id = Crypt::encrypt($soal[$i]['kode_soal']); $nomor = $i+1; ?>
                    
                    <?php echo e($nomor); ?>. <?php echo e($soal[$i]['pertanyaan']); ?> <br>
                    
                    <a class="btn btn-primary float-right mr-3" href="<?php echo e(route('student.soal_edit_persoal', [$id , $nomor, $id_param = Crypt::encrypt($soal_judul->kode_judul_soal)])); ?>">edit</a>

                    <?php if($hasil[$i]['jawaban'] == 1): ?>
                        A. <?php echo e($soal[$i]['pilihan1']); ?> <br>
                    <?php elseif($hasil[$i]['jawaban'] == 2): ?>
                        B. <?php echo e($soal[$i]['pilihan2']); ?> <br>
                    <?php elseif($hasil[$i]['jawaban'] == 3): ?>
                        C. <?php echo e($soal[$i]['pilihan3']); ?> <br>
                    <?php elseif($hasil[$i]['jawaban'] == 4): ?>
                        D. <?php echo e($soal[$i]['pilihan4']); ?> <br>
                    <?php elseif($hasil[$i]['jawaban'] == 5): ?>
                        E. <?php echo e($soal[$i]['pilihan5']); ?> <br>
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
            

            Swal.fire({
                title: 'Apakah anda yakin telah selesai?',
                text: "Anda tidak akan bisa kembali lagi!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Selesai'
                }).then((result) => {
                if (result.value) {

                    $(".form-hasil").submit();

                    Swal.fire({
                        title: 'Berhasil',
                        text: "Jawaban telah dihitung!",
                        type: 'success',
                        showCancelButton: false,
                        showConfirmButton: false
                    })

                }
                })
        });

    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/soal_edit_semua.blade.php ENDPATH**/ ?>