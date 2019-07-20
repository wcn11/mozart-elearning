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
            <div class="card-body container-utama overflow-auto" style="min-height:390px;">
                <div class="row ">

                    <div class="col-md-12">

                    <table id="tabel" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                    <tr style="text-align:center;">
                                        <th>Judul Soal</th>
                                        <th>Mentor</th>
                                        <th><sup>Jumlah</sup> Soal</th>
                                        <th>Pelajaran</th>
                                        <th>waktu</th>
                                        <th><sup>Status</sup> Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($s->judul); ?></td>
                                            <td><?php echo e($s->kjs_ke_mentor[0]['name']); ?></td>
                                            <td><?php echo e($s->jumlah_soal); ?></td>
                                        <td><?php echo e($s->pelajaran['nama_pelajaran']); ?></td>
                                        <td><?php echo e($s->tanggal_mulai); ?> - <?php echo e($s->tanggal_selesai); ?></td>
                                        <td>status</td>
                                        <td>
                                                <a class="btn btn-success" href="<?php echo e(route('master.lihat_soal', Crypt::encrypt($s->kode_judul_soal))); ?>"><i class="fas fa-eye"></i> Lihat</a>
                                                <button class="btn btn-danger btn-hapus" data-id="<?php echo e($s->kode_judul_soal); ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                                            <form action="<?php echo e(route('master.delete_soal', $s->kode_judul_soal)); ?>" class="form-hapus-<?php echo e($s->kode_judul_soal); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                        </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                        </table>
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
<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function(){
        $("#tabel").DataTable();

        $(".btn-hapus").click(function(){
            var kode = $(this).attr("data-id");

            Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "seluruh data mengenai soal ini akan di hapus sepenuhnya!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus!'
            }).then((result) => {
            if (result.value) {

                $(".form-hapus-"+kode).submit();
            }
            })
        });
    });
</script>


<?php if(Session::has("soal_terhapus")): ?>
<script>
    Swal.fire(
                'Terhapus!',
                'Berhasil menghapus soal.',
                'success'
                )
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/master/soal.blade.php ENDPATH**/ ?>