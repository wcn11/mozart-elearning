<?php $__env->startSection('main-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
            class="badge badge-danger">mengeluarkan</span> murid anda.</p>
    <div class="col text-right mb-3 mt-3">

        <a href="<?php echo e(route('mentor.materi_upload')); ?>" class="btn btn-dark"> Tambah materi</a>
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
                            <th>Judul Materi</th>
                            <th>Materi</th>
                            <th>Pelajaran</th>
                            <th>Dibuat</th>
                            <th>Terakhir Update</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($materi)): ?>
                        <tr>
                            <td colspan="6" style="text-align:center;">Anda belum membuat materi</td>
                        </tr>
                        <?php else: ?>
                        <?php $__currentLoopData = $materi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr style="text-align:center;">
                            <td style="width: 35%; text-align:left;"><?php echo e($m->judul_materi); ?></td>
                            <td>
                                <button class="btn  btn-dark btn-sm btn-lihat" data-judul="<?php echo e($m->judul_materi); ?>"
                                    data-materi="<?php echo e($m->materi); ?>">Lihat Materi</button> |
                                    <?php $id = Crypt::encrypt($m->kode_materi); ?>
                                    <a class="btn  btn-success btn-sm" href="<?php echo e(action('Mentor\MateriController@downloadPDF', $id)); ?>">Download Materi (PDF)<br><sup>Video tidak akan tampil</sup></a>
                            </td>
                            <td><?php echo e($m->pelajaran->nama_pelajaran); ?></td>

                            <td><?php echo e($m->dibuat); ?></td>
                            <td> <?php echo e($m->diupdate); ?></td>
                            <td>
                                <?php $id = Crypt::encrypt($m->kode_materi); ?>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-outline-dark dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><i class="fas fa-cogs"></i></button>
                                    <div class="dropdown-menu shadow text-left rounded" style="background:mintcream;">
                                        <div>
                                                <li class="p-2 container-hapus btn-hapus" data-id="<?php echo e($m->kode_materi); ?>">
                                                    <a href="javascript:void(0)" class="text-decoration-none">
                                                        <i class="fas fa-trash-alt btn btn-danger btn-md rounded-circle"></i>
                                                        <strong class="text-danger">hapus</strong>
                                                    </a>
                                                    <form class="form-hapus-<?php echo e($m->kode_materi); ?>" action="<?php echo e(url('mentor/materi/delete', $id)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                    </form>
                                                </li>
                                                <li class="p-2 container-edit btn-edit" data-id="<?php echo e($m->kode_materi); ?>">
                                                    <a href="javascript:void(0)" class="text-decoration-none">
                                                        <i class="fas fa-edit btn btn-warning btn-md rounded-circle text-white"></i>
                                                        <strong class="text-warning">edit</strong>
                                                    </a>
                                                    <form class="form-edit-<?php echo e($m->kode_materi); ?>" action="<?php echo e(route('mentor.materi_edit', $id)); ?>" method="get">
                                                        <?php echo csrf_field(); ?>
                                                    </form>
                                                </li>
                                        </div>
                                    </div>
                                </div>
                            </td>
            </div>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
</div>



<div class="modal fade bd-example-modal-xl modal-materi" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h5 class="modal-title"
                        style="font-size: 15px; text-align:center; font-weight:bold; text-transform:capitalize;"></h5>
                </div>
                <button type="button" class="close btn-tutup" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-tutup" data-dismiss="modal">Tutup</button>
               
            </div>
        </div>
    </div>
</div>


      

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>

<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<style>
    .container-hapus:hover, .container-edit:hover{
        background-color: ivory;
        cursor: pointer;
    }
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
    $(document).ready(function () {

        $(".btn-hapus").click(function(){

            var id = $(this).attr("data-id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data materi tidak akan bisa dikembalikan!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#343a40',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        $(".form-hapus-"+id).submit();
                    }
                })
        });

        $(".btn-edit").click(function(){
            var id = $(this).attr("data-id");

            console.log(id);

            $(".form-edit-" + id).submit();

        });

        $('#tabel').DataTable();

        $(".btn-lihat").click(function () {
            var judul = $(this).attr("data-judul");
            var materi = $(this).attr("data-materi");
            $(".modal-dialog").removeClass("modal-xs");
            $(".modal-materi").modal({ backdrop: "static" });
            $(".modal-title").append(judul);
            $(".modal-body").append(materi);
        });
        $(".btn-tutup").click(function () {
            $(".modal-title").text("");
            $(".modal-body").text("");
        });
    });
</script>

<?php if(Session::get('success_upload_materi')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah menambahkan materi baru!',
        'success'
    )
</script>
<?php endif; ?>

<?php if(Session::get('success_update_materi')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah mengupdate materi!',
        'success'
    )
</script>
<?php endif; ?>

<?php if(Session::get('hapus_materi')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah menghapus materi!',
        'success'
    )
</script>


<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/mentor/pages/materi/daftar_materi.blade.php ENDPATH**/ ?>