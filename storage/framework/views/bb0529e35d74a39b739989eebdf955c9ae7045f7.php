<?php $__env->startSection('main-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Materi Editor</h1>
    <p class="mb-4">Upload makalah anda dengan sebaik baiknya, dan biarkan pada muridmu membacanya kembali.</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
            <form class="form form-upload" action="<?php echo e(route('mentor.materi_upload_aksi')); ?>" class="col-md-12" method="POST" enctype="multipart/form-data">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Murid</h6>
        </div>
            <div class="card-body">
                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 grid-margin">
                        <div class="card" style="border:0;">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">Judul</span>
                                        </div>
                                        <input type="text" class="form-control" name="judul" id="validationServer01"
                                            placeholder="Judul materi" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">Kategori pelajaran</span>
                                        </div>
                                        <select class="custom-select" name="kode_mapel" required>
                                            <?php $__currentLoopData = $mapel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mapel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($mapel->kode_mapel); ?>"><?php echo e($mapel->nama_pelajaran); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">Cover</span>
                                        </div>
                                        
                                    <div class="form-row">
                                        <input type='file' name="cover" id="cover" />
                                        <img id="image_upload_preview"  class="rounded-circle gambar" />    
                                    </div>
                                    <?php if($errors->has('cover')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('cover')); ?></strong>
                                        </span>
                                    <?php endif; ?>
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
                                        <button type="button" class="btn btn-md btn-outline-success w-25 btn-publikasi" required><i class="fas fa-upload"></i> Publikasi</button>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">Tanggal publikasi</span>
                                        </div>
                                        <input type="text" class="form-control" id="tanggal" required disabled>
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
            <br>
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

    .gambar {
        width: 20%;
        height: auto;
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

        $(".btn-publikasi").click(function(){
            var judul = $("[name='judul']").val();
            var cover = $("[name='cover']").val();

            if(judul == ""){
                Swal.fire(
                    'Judul Kosong!',
                    'Anda harus mengisi judul materi!',
                    'warning'
                );
            }else if(cover == ""){
                Swal.fire(
                    'Cover Belum Diupload!',
                    'Anda harus menggunggah sebuah cover!',
                    'warning'
                );
            }else{
                $(".form-upload").submit();
            }
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


function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#cover").change(function () {
        readURL(this);
    });

    $('.btn-update').click(function(){
        var name = $("[name='name']").val();
        var email = $("[email='email']").val();

        if(name == "" && email == ""){
            $(".modal-update").modal();
        }else{
            $(".form-update").submit();
        }
    });
</script>

<?php if($pesan_update = Session::get('success_update_materi')): ?>
<script>
    berhasilUpdateMateri()

</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/mentor/pages/materi/materi_upload.blade.php ENDPATH**/ ?>