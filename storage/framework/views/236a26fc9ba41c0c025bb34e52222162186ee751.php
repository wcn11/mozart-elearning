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
                                        <th><sup>Jumlah</sup> Soal</th>
                                        <th>Pelajaran</th>
                                        <th>waktu</th>
                                        <th><sup>Status</sup> Waktu</th>
                                        <th><sup>Status</sup> Mengerjakan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($soal)): ?>
                                        <tr>
                                            <td colspan="6" style="text-align:center;">Mentor belum membuat soal</td>
                                        </tr>
                                    <?php else: ?>
                                    <?php for($i = 0; $i < count($soal); $i++): ?>
                                    <tr style="text-align:center;" class="data-soal-<?php echo e($i); ?>" data-id="<?php echo e($soal[$i]['kode_judul_soal']); ?>">
                                        <td style="width: 35%; text-align:left;"><?php echo e($soal[$i]['judul']); ?></td>
                                        <td><?php echo e($soal[$i]['jumlah_soal']); ?></td>
                                        <td><?php echo e($soal[$i]['pelajaran']['nama_pelajaran']); ?></td>
                                        <td><?php echo e($soal[$i]['tanggal_mulai']); ?> - <?php echo e($soal[$i]['tanggal_selesai']); ?></td>
                                        <td><?php echo e($status_batas[$i]['status'.$i]); ?></td>
                                        <?php if($status_batas[$i]['status'.$i] == "lewat" && $status_mengerjakan[$i]['status'.$i] == "belum"): ?>
                                            <td>
                                                <span class="badge badge-danger">Tidak Mengerjakan</span>
                                            </td>
                                            
                                            <td>
                                                <span class="badge badge-danger">Tidak Mengerjakan</span>
                                            </td>
                                        <?php elseif($status_batas[$i]['status'.$i] == "lewat" && $status_mengerjakan[$i]['status'.$i] == "selesai"): ?>
                                            <td>
                                                <span class="badge badge-success">Selesai</span>
                                            </td>
                                            
                                            <td>
                                                <a class="btn btn-outline-info" href="<?php echo e(route('student.soal_nilai_cetak', $soal[$i]['kode_judul_soal'])); ?>"> <i class="fas fa-print"></i> Cetak</a>
                                            </td>zzz
                                        <?php elseif($status_batas[$i]['status'.$i] == "waktunya" && $status_mengerjakan[$i]['status'.$i] == "belum"): ?>
                                            <td>
                                                <span class="badge badge-warning">Waktunya</span>
                                            </td>
                                            <td>
                                                <?php $id = Crypt::encrypt($soal[$i]['kode_judul_soal']); ?>
                                                
                                                <form method="get" action="<?php echo e(route('student.soal_mengerjakan', [$id, $id_param = $id])); ?>">
                                                    <button class="btn btn-info text-white" >Kerjakan</button>
                                                </form>
                                            </td>
                                        <?php elseif($status_batas[$i]['status'.$i] == "waktunya" && $status_mengerjakan[$i]['status'.$i] == "selesai"): ?>
                                            <td>
                                                <span class="badge badge-success">Selesai</span>
                                            </td>
                                            <td>
                                                <?php $id = Crypt::encrypt($soal[$i]['kode_judul_soal']); ?>
                                                <a class="btn btn-outline-info" href="<?php echo e(route('student.soal_nilai_cetak', $soal[$i]['kode_judul_soal'])); ?>"> <i class="fas fa-print"></i> Cetak</a>
                                            </td>
                                        <?php elseif($status_batas[$i]['status'.$i] == "Belum waktunya"): ?>
                                            <td><span class="badge badge-secondary">Belum waktunya</span></td>
                                            <td><span class="badge badge-secondary">Belum waktunya</span></td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endfor; ?>
                                    <?php endif; ?>
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
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/daftar_soal_mentor.blade.php ENDPATH**/ ?>