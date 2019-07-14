<?php $__env->startSection('main-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Materi Maker</h1>
    <p class="mb-4">Posting  apapun tentang pengetahuan anda, dan biarkan seluruh dunia melihat karyamu lewat materi ini.</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
            <form class="form" action="<?php echo e(route('mentor.materi_update')); ?>" class="col-md-12" method="POST">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Murid</h6>
        </div>
            <div class="card-body">

                <?php echo csrf_field(); ?>
                <?php $id = Crypt::encrypt($m->kode_materi); ?>
                <input type="hidden" name="kode_materi" value="<?php echo e($id); ?>">
                <div class="row">
                    <div class="col-md-6 grid-margin">
                        <div class="card" style="border:0;">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">Judul</span>
                                        </div>
                                        <input type="text" value="<?php echo e($m->judul_materi); ?>" class="form-control <?php echo e($errors->has('judul') ? ' is-invalid' : ''); ?>" name="judul" id="validationServer01"
                                            placeholder="Judul materi" required>
                                            <?php if($errors->has('judul')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('judul')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">Kategori pelajaran</span>
                                        </div>
                                        <select class="custom-select" name="kode_mapel" required>
                                                <?php $__currentLoopData = $pelajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($p->kode_mapel); ?>" <?php echo e($m->pelajaran['id'] === $p->kode_mapel ? "selected='selected'" : ''); ?>><?php echo e($p->nama_pelajaran); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin">
                        <div class="card" style="border:0;">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3" style="text-align:end;">

                                            <div class="input-group-prepend invisible">
                                                    <span class="input-group-text bg-info text-white">Hidden</span>
                                                </div>
                                        <button type="submit" class="btn btn-lg btn-success w-25" required>Update</button>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">Tanggal Update</span>
                                        </div>
                                        <input type="text" class="form-control" id="tanggal"
                                             required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <h4 class="card-title">Materi editor</h4>
            <textarea id="summernote" name="materi">
                    <?php echo e($m->materi); ?>

                </textarea>
        </div>
    </div>
</form>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scriptcss'); ?>
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">

<style>
    #publish:hover {
        cursor: pointer;
    }

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            placeholder: "Masukkan materi",
            height: 500, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        var jam = today.getHours();
        var menit = today.getMinutes();
        var detik = today.getSeconds();

        today = dd + '/' + mm + '/' + yyyy + " | " + jam + ":" + menit + ":" + detik;
        $("#tanggal").val(today);
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/mentor/pages/materi/materi_edit.blade.php ENDPATH**/ ?>