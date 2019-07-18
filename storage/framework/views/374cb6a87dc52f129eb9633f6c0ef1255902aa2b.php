<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Review jawaban</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="text-center"><?php echo e($soal_judul->judul); ?></h5>
                <p class="text-dark float-left"><i class="fas fa-check"></i> Benar       : <?php echo e($nilai[0]['nilai']); ?></p><span class="clearfix"></span>
                <p class="text-dark float-left"><i class="fas fa-times-circle"></i> Salah : <?php echo e($soal_judul->jumlah_soal - $nilai[0]['nilai']); ?></p><span class="clearfix"></span>
                <p class="text-dark float-left"><i class="fas fa-calendar-check"></i> Jumlah Soal : <?php echo e($soal_judul->jumlah_soal); ?></p>
                <br>
                <div class="row justify-content-end">
                    
                    <a class="btn btn-info btn-md btn-selesai text-white m-2" href="<?php echo e(route('student.soal_nilai_cetak', $soal_judul->kode_judul_soal)); ?>"><i class="fas fa-print"></i> Cetak</a>

                    <a class="btn btn-secondary text-white m-2" href="<?php echo e(route('student.soal')); ?>"><i class="fas fa-stream"></i> Kembali</a>
                </div>

            </div>
            <?php $id = Crypt::encrypt($soal_judul->kode_judul_soal) ?>
            <input type="hidden" name="soal_judul_id" value="<?php echo e($id); ?>">
            <div class="card-body">

                <?php for($i = 0; $i < $soal_judul->jumlah_soal; $i++): ?>
                
                    <?php $id = Crypt::encrypt($soal[$i]['id']); $nomor = $i+1; ?>
                    
                    <?php echo e($nomor); ?>. <?php echo e($soal[$i]['pertanyaan']); ?> <br>

                    <?php if($jumlah_jawaban <= $i): ?>
                        <div class="p-2">Belum memilih</div>
                    <?php else: ?>
                        <?php if($soal[$i]['pilihan_benar'] == 1): ?>
                            <?php if($hasil[$i]['jawaban'] == 1): ?>
                                <div class="border-bottom-success p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 2): ?>
                                <div class="border-bottom-success p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="border-bottom-danger p-2">B. <?php echo e($soal[$i]['pilihan2']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 3): ?>
                                <div class="border-bottom-success p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="border-bottom-danger p-2">C. <?php echo e($soal[$i]['pilihan3']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 4): ?>
                                <div class="border-bottom-success p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="border-bottom-danger p-2">D. <?php echo e($soal[$i]['pilihan4']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 5): ?>
                                <div class="border-bottom-success p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="border-bottom-danger p-2">E. <?php echo e($soal[$i]['pilihan5']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                            <?php else: ?>
                                Belum memilih
                            <?php endif; ?>

                        <?php elseif($soal[$i]['pilihan_benar'] == 2): ?>
                            <?php if($hasil[$i]['jawaban'] == 1): ?>
                                <div class="border-bottom-danger p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="border-bottom-success p-2">B. <?php echo e($soal[$i]['pilihan2']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 2): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="border-bottom-success p-2">B. <?php echo e($soal[$i]['pilihan2']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 3): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="border-bottom-success p-2">B. <?php echo e($soal[$i]['pilihan2']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="border-bottom-danger p-2">C. <?php echo e($soal[$i]['pilihan3']); ?><span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 4): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="border-bottom-success p-2">B. <?php echo e($soal[$i]['pilihan2']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="border-bottom-danger p-2">D. <?php echo e($soal[$i]['pilihan4']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 5): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="border-bottom-success p-2">B. <?php echo e($soal[$i]['pilihan2']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="border-bottom-danger p-2">E. <?php echo e($soal[$i]['pilihan5']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                            <?php else: ?>
                                Belum memilih
                            <?php endif; ?>

                        <?php elseif($soal[$i]['pilihan_benar'] == 3): ?>
                            <?php if($hasil[$i]['jawaban'] == 1): ?>
                                <div class="border-bottom-danger p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="border-bottom-success p-2">C. <?php echo e($soal[$i]['pilihan3']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 2): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="border-bottom-danger p-2">B. <?php echo e($soal[$i]['pilihan2']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="border-bottom-success p-2">C. <?php echo e($soal[$i]['pilihan3']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 3): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="border-bottom-success p-2">C. <?php echo e($soal[$i]['pilihan3']); ?><span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 4): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="border-bottom-success p-2">C. <?php echo e($soal[$i]['pilihan3']); ?><span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="border-bottom-danger p-2">D. <?php echo e($soal[$i]['pilihan4']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 5): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="border-bottom-success p-2">C. <?php echo e($soal[$i]['pilihan3']); ?><span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="border-bottom-danger p-2">E. <?php echo e($soal[$i]['pilihan5']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                            <?php else: ?>
                                Belum memilih
                            <?php endif; ?>

                        <?php elseif($soal[$i]['pilihan_benar'] == 4): ?>
                            <?php if($hasil[$i]['jawaban'] == 1): ?>
                                <div class="border-bottom-danger p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="border-bottom-success p-2">D. <?php echo e($soal[$i]['pilihan4']); ?><span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 2): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="border-bottom-danger p-2">B. <?php echo e($soal[$i]['pilihan2']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="border-bottom-success p-2">D. <?php echo e($soal[$i]['pilihan4']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 3): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="border-bottom-danger p-2">C. <?php echo e($soal[$i]['pilihan3']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="border-bottom-success p-2">D. <?php echo e($soal[$i]['pilihan4']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 4): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="border-bottom-success p-2">D. <?php echo e($soal[$i]['pilihan4']); ?> <span class="float-right badge badge-success"><i class="fas fa-times-circle"></i> Jawaban benar</span></div>
                                <div class="p-2">E. <?php echo e($soal[$i]['pilihan5']); ?></div>
                            <?php elseif($hasil[$i]['jawaban'] == 5): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="border-bottom-success p-2">D. <?php echo e($soal[$i]['pilihan4']); ?><span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="border-bottom-danger p-2">E. <?php echo e($soal[$i]['pilihan5']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                            <?php else: ?>
                                Belum memilih
                            <?php endif; ?>

                            <?php elseif($soal[$i]['pilihan_benar'] == 5): ?>
                            <?php if($hasil[$i]['jawaban'] == 1): ?>
                                <div class="border-bottom-danger p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="border-bottom-success p-2">E. <?php echo e($soal[$i]['pilihan5']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                            <?php elseif($hasil[$i]['jawaban'] == 2): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="border-bottom-danger p-2">B. <?php echo e($soal[$i]['pilihan2']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="border-bottom-success p-2">E. <?php echo e($soal[$i]['pilihan5']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                            <?php elseif($hasil[$i]['jawaban'] == 3): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="border-bottom-danger p-2">C. <?php echo e($soal[$i]['pilihan3']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?> </div>
                                <div class="border-bottom-success p-2">E. <?php echo e($soal[$i]['pilihan5']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                            <?php elseif($hasil[$i]['jawaban'] == 4): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="border-bottom-danger p-2">D. <?php echo e($soal[$i]['pilihan4']); ?> <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="border-bottom-success p-2">E. <?php echo e($soal[$i]['pilihan5']); ?> <span class="float-right badge badge-success"><i class="fas fa-times-circle"></i> Jawaban benar</span></div>
                            <?php elseif($hasil[$i]['jawaban'] == 5): ?>
                                <div class="p-2"> A. <?php echo e($soal[$i]['pilihan1']); ?></div>
                                <div class="p-2">B. <?php echo e($soal[$i]['pilihan2']); ?></div>
                                <div class="p-2">C. <?php echo e($soal[$i]['pilihan3']); ?></div>
                                <div class="p-2">D. <?php echo e($soal[$i]['pilihan4']); ?></div>
                                <div class="border-bottom-success p-2">E. <?php echo e($soal[$i]['pilihan5']); ?> <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                            <?php else: ?>
                                Belum memilih
                            <?php endif; ?>
                        <?php else: ?>
                            Belum diisi
                        <?php endif; ?>
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

<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/soal_nilai_review.blade.php ENDPATH**/ ?>