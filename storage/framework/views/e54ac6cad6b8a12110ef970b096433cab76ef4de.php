<?php $__env->startSection('main-content'); ?>

<div class="container-fluid">

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"></h1>
        <div class="col text-right mb-3 mt-3">
    
            <button class="btn btn-dark btn-modal-tambah-pelajaran"> <i class="fab fa-leanpub"></i> Tambah mata pelajaran</button>
        </div>
        
    <!-- DataTales Example -->
    <div class="card shadow mb-4 animated bounceInDown">
        <div class="card-header py-3 text-center">
            <h6 class="m-0 font-weight-bold text-primar bounce animated">Tabel pelajaran</h6>
        </div>
        <div class="card-body">
            
                <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                      </div>
            
        </div>
    </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>

<style>
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<?php if($pesan = Session::get('berhasil_mengikuti')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda berhasil mengikuti salah satu mentor!',
        'success'
    )

</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/pelajaran.blade.php ENDPATH**/ ?>