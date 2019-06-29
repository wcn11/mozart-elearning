 <?php $__env->startSection('main-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span class="badge badge-danger">mengeluarkan</span> murid anda.</p>
    <div class="col text-right mb-3 mt-3">

        <button class="btn btn-dark btn-update"> Update</button>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data diri</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive w-100">

            <form class="form-update" action="<?php echo e(route('mentor.profil_update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                                <div class="row">
                    <div class="col-md-6 grid-margin">
                        <div class="card" style="border:0;">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">Nama</span>
                                        </div>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Nama" value="<?php echo e($mentor->name); ?>" required>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">E-mail</span>
                                        </div>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Email anda" value="<?php echo e($mentor->email); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin">
                        <div class="card" style="border:0;">
                            <div class="card-body">
                                <div class="form-row">
                                    <label for="inputFile">Foto profil :  </label><br>
                                <input type='file' name="file" value="<?php echo e($mentor->foto); ?>" id="inputFile" />
                    
                            <img id="image_upload_preview" src="<?php echo e(url('images/'. $mentor->foto)); ?>" class="rounded-circle gambar" alt="your image" />
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <input type="hidden" name="foto_lama" value="<?php echo e($mentor->foto); ?>">
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade bd-example-modal-xl modal-materi" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title" style="font-size: 15px; text-align:center; font-weight:bold; text-transform:capitalize;"></h5>
                </div>
                <button type="button" class="close btn-tutup" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-konfirmasi" onclick="event.preventDefault();document.getElementById('form-hapus').submit();" data-dismiss="modal">Hapus</button>
                <button type="button" class="btn btn-info btn-tutup" data-dismiss="modal">Tutup</button>
                <form id="form-hapus" action="#" method="post">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-update" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      Anda harus melengkapi seluruh field!
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?> <?php $__env->startSection('scriptcss'); ?>

<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<style>
    .gambar {
        width: 20%;
        height: auto;
    }
</style>
<?php $__env->stopSection(); ?> <?php $__env->startSection('scriptjs'); ?>
<!-- Page level plugins -->
<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
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


<?php if($pesan_hapus = Session::get('update_profil')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda berhasil mengupdate profil!',
        'success'
    )

</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/mozart-learn/resources/views/mentor/pages/profil.blade.php ENDPATH**/ ?>