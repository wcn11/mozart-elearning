


<?php $__env->startSection('main-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span class="badge badge-danger">mengeluarkan</span> murid anda.</p>
    <div class="col text-right mb-3 mt-3">

        <button class="btn btn-dark btn-buat-soal"> Buat soal</button>
    </div>

    <div class="card shadow mb-4 form-buat-soal">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Buat soal</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive w-100">
                <form class="form" action="<?php echo e(route('mentor.question_create_title')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="judul">Judul Soal<span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="<?php echo e(old('judul')); ?>" placeholder="contoh : Quiz pengenalan ekologi sistem pangan">
                    </div>
                    <div class="form-group">
                        <label for="pelajaran_id">Mata Pelajaran<span class="text-danger">*</span></label>
                        <select class="form-control" name="pelajaran_id"  value="<?php echo e(old('pelajaran_id')); ?>" required>
                            <?php $__currentLoopData = $pelajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($p->id); ?>"><?php echo e($p->nama_pelajaran); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah soal<span class="text-danger">*</span></label>
                        <span id="pesan_error" class="text-danger"></span>
                        <input type="number" name="jumlah_soal" class="form-control" min="5" max="20" value="5" id="jumlah_soal">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Waktu mengerjakan<span class="text-danger">*</span></label>
                        <span id="pesan_error_waktu" class="text-danger"></span>
                        <br>
                        <p class="font-italic text-warning">masukkan waktu per-jam. contoh: 5 jam </p>
                        <input type="number" name="waktu_pengerjaan" class="form-control" min="1" max="24" value="1" id="jumlah_waktu">
                    </div>

                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Murid</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive w-100">
            <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                <thead>
                    <tr style="text-align:center;">
                        <th>Judul</th>
                        <th>pelajaran</th>
                        <th>Jumlah Soal</th>
                        <th>Waktu Pengerjaan</th>
                        <th>Dibuat</th>
                        <th>Diupdate</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($sj)): ?>
                    <tr>
                        <td colspan="7" style="text-align:center;">Anda belum membuat soal</td>
                    </tr>
                    <?php else: ?>

                    <?php $__currentLoopData = $sj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="text-align:center;">
                        <td style="width: 35%; text-align:left;"><?php echo e($s->judul); ?></td>
                        <td><?php echo e($s->pelajaran->nama_pelajaran); ?></td>
                        <td><?php echo e($s->jumlah_soal); ?></td>
                        <td><?php echo e($s->waktu_pengerjaan); ?> jam</td>
                        <td><?php echo e($s->dibuat); ?></td>
                        <?php if(empty($s->diupdate)): ?>
                        <td> Belum pernah</td>
                        <?php else: ?>
                        <td><?php echo e($s->diupdate); ?></td>
                        <?php endif; ?>
                        <td class="text-center">
                        <button class="btn btn-danger btn-hapus" data-link="<?php echo e(url('mentor/soal/delete', $s->id)); ?>">Hapus</button>
                            <a class="btn btn-info" href="<?php echo e(route('mentor.soal_edit', $s->id)); ?>">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>




<div class="modal fade bd-example-modal-xl modal-hapus" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title"
                        style="font-size: 15px; text-align:center; font-weight:bold; text-transform:capitalize;"></h5>
                </div>
                <button type="button" class="close btn-tutup" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus soal ini ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-konfirmasi"
                    onclick="event.preventDefault();document.getElementById('form-hapus').submit();"
                    data-dismiss="modal">Hapus</button>
                <button type="button" class="btn btn-info btn-tutup" data-dismiss="modal">Tutup</button>
                <form id="form-hapus" action="#" method="post">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>

<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">

<style>
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>
<!-- Page level plugins -->
<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function() {

        $('#tabel').DataTable();

        $(".form-buat-soal").hide();

        $("#jumlah_soal").keypress(function(e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#pesan_error").html("Hanya Angka!").show().fadeOut("slow");
                return false;
            }
        });

        $("#jumlah_waktu").keypress(function(e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#pesan_error_waktu").html("Hanya Angka!").show().fadeOut("slow");
                return false;
            }
        });

        $(".btn-buat-soal").click(function() {
            $(".form-buat-soal").toggle(1000);
            $(this).addClass("btn-buat-soal-tutup");
        });

        $(".btn-hapus").click(function(){
            $("#form-hapus").attr("action");
            var link = $(this).attr("data-link");
            console.log(link);
            $(".modal-hapus").modal();
            $("#form-hapus").attr("action", link)
        });

    });
</script>

<?php if(Session::get('hapus_soal')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah berhasil menghapus soal!',
        'success'
    )

</script>
<?php endif; ?>

<?php if(Session::get('buat_soal')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah berhasil menambahkan soal!',
        'success'
    )

</script>
<?php endif; ?>

<?php if(Session::get('update_soal')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah berhasil mengubah soal!',
        'success'
    )

</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/mozart-learn/resources/views/mentor/pages/question/index.blade.php ENDPATH**/ ?>