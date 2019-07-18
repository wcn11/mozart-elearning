<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><img src="https://img.icons8.com/color/48/000000/todo-list.png" style="width:30px;"> Daftar Materi</h1>
     <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
            class="badge badge-danger">mengeluarkan</span> murid anda.</p>  

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><img src="https://img.icons8.com/color/48/000000/student-male.png" width="30px"/>Murid</h6>
        </div>
        <div class="card-body container-utama text-left">

            <div class="row">
                
                <?php $__currentLoopData = $materi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="col-md-3">
                        <div class="card materi rounded">
                            <a href="<?php echo e(route('student.materi_read', $m->kode_materi)); ?> ">
                                <img src="<?php echo e(url('/images/'.$m->cover)); ?>" alt="John" style="width:100%"  data-toggle="tooltip" data-placement="top" title="<?php echo e($m->judul_materi); ?>">
                                <p class="title p-2" data-toggle="tooltip" data-placement="top" title="<?php echo e($m->judul_materi); ?>"><?php echo e($m->judul_materi); ?></p>
                            </a>
                            <p><img src="https://img.icons8.com/color/48/000000/math.png" class="icon-colored"> <?php echo e($m->pelajaran->nama_pelajaran); ?></p>
                            <p>
                                <p class="badge badge-info"><?php echo e($m->dibuat); ?></p>
                                <a href="<?php echo e(route('student.materi_read', $m->kode_materi)); ?>"><button class="baca rounded"><img src="https://img.icons8.com/color/48/000000/reading-ebook.png" style="width:30px;"> Baca</button></a>
                            </p>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div>
    </div> 

</div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.1/cropper.min.css">
<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('tooltip/css/animate.css')); ?>">

<style>
.container-utama{
    height: auto;
}
.materi {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 14px;
}
.title{
    white-space: nowrap; 
  width: 100%; 
  overflow: hidden;
  text-overflow: ellipsis; 
}

.baca {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.baca:hover, a:hover {
  opacity: 0.7;
}

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>

<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <script>
	

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/daftar_materi.blade.php ENDPATH**/ ?>