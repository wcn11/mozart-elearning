 <?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h3 mb-2 text-gray-800">Daftar Mentor</p>
    <p class="mb-4">Pilih mentor utuk dapat mulai belajar</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mentor</h6>
        </div>
        <div class="card-body">
            <div class="row">

                <?php $__currentLoopData = $mentor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb m-3">
                        <div class="flip-card p-2 m-2">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img class="rounded" src="<?php echo e(url('/images/'.$m->foto)); ?>" alt="Avatar" style="width:100%;height:100%;">
                                    <div class="badge-keterangan">
                                        <div class="col-md-12">
                                            <span class="badge badge-success badge-diikuti badge-diikuti-<?php echo e($m->id_mentor); ?>"><i class="fas fa-user-alt-slash"></i> Diikuti</span>
                                            <span class="badge badge-danger badge-penuh badge-penuh-<?php echo e($m->id_mentor); ?>"><i class="fas fa-user-alt-slash"></i> Penuh</span>
                                            <span class="badge badge-info badge-ikuti-<?php echo e($m->id_mentor); ?>" data-id="<?php echo e($m->id_mentor); ?>"><i class="fas fa-user-alt-slash"></i> Tidak mengikuti</span>
                                        </div>
                                    </div>
                                    <div class="nama bg-white rounded" style="width:88%;">
                                        <p class="text-dark text-capitalize text-left m-2"><?php echo e($m->name); ?></p>
                                    </div>
                                </div>
                                <div class="flip-card-back rounded">
                                    <h4 class="font-weight-bold text-capitalize p-2"><?php echo e($m->name); ?></h4>
                                    <p>Mentor & Guru</p> 
                                    <p><?php echo e($m->email); ?></p> 
                                    Jumlah Kuota :  <span class="kuota-kini-<?php echo e($m->id_mentor); ?>"></span> / <?php echo e($m->kuota); ?> <br>
                                    Status Kelas : <span class="status-penuh badge badge-danger status-penuh-<?php echo e($m->id_mentor); ?>"> <i class="fas fa-user-alt-slash"></i> Penuh</span><span class="status-tersedia badge badge-success status-tersedia-<?php echo e($m->id_mentor); ?>">Tersedia <i class="fas fa-check"></i></span><br>
                                    <br>
                                    <a class="btn btn-danger btn-sm btn-unfollow btn-unfollow-<?php echo e($m->id_mentor); ?>" href="javascript:void(0)" data-id="<?php echo e($m->id_mentor); ?>" data-nama="<?php echo e($m->name); ?>"><i class="fa fa-sign-out-alt"></i> Berhenti ikuti mentor</a>
                                </div>
                                <form class="form-unfollow-<?php echo e($m->id_mentor); ?>" action="<?php echo e(route("student.unfollow", $m->id_mentor)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                            <a class="btn-ikuti-<?php echo e($m->id_mentor); ?> btn btn-info btn-ikuti shadow" style="width:90%;" href="<?php echo e(route('student.ikuti_mentor', $m->id_mentor)); ?>"><i class="fas fa-door-open"></i> Ikuti</a>
                            <button class="btn btn-danger shadow btn-penuh btn-penuh-<?php echo e($m->id_mentor); ?>" type="button" style="width:90%;"><i class="fas fa-user-alt-slash"></i> Penuh</button>
                            <a class="btn-diikuti-<?php echo e($m->id_mentor); ?> btn btn-success btn-diikuti shadow" style="width:90%;" href="javascript:void(0)"><i class="fas fa-map-pin"></i> Diikuti</a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
<style>

    .btn-diikuti,
    .btn-unfollow,
    .badge-diikuti,
    .badge-penuh,
    .btn-penuh,
    .status-penuh,
    .status-tersedia{
        display: none;
    }

    .nama {
        position: absolute;
        bottom: 8px;
        left: 16px;
    }
    .badge-keterangan{
        position: absolute;
        bottom: 25%;
    }
    
    .flip-card {
        background-color: transparent;
        width: 300px;
        height: 300px;
        perspective: 1000px;
    }
    
    .flip-card-inner {
        position: relative;
        width: 90%;
        height: 90%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }
    
    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }
    
    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
    }
    
    .flip-card-front {
        background-color: #bbb;
        color: black;
    }
    
    .flip-card-back {
        background-color: #2980b9;
        color: white;
        transform: rotateY(180deg);
    }
</style>
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('scriptjs'); ?>

<script>

    $(document).ready(function(){

        $("#v-pills-tab a:first-child").addClass("show active");
        $("#v-pills-tabContent div:first-child").addClass("show active");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "<?php echo e(url('student/mentor/ambildata')); ?>",
            success: function(hasil){
                for(var i = 0; i < hasil.length; i++){

                    $(".btn-ikuti-" + hasil[i]['id_mentor']).hide();
                    $(".badge-ikuti-" + hasil[i]['id_mentor']).hide();

                    $(".btn-diikuti-" + hasil[i]['id_mentor']).show();
                    $(".badge-diikuti-" + hasil[i]['id_mentor']).show();

                    $(".btn-unfollow-" + hasil[i]['id_mentor']).show();
                }
            }
        });

        $.ajax({
            type: "post",
            url: "<?php echo e(url('student/mentor/ambildatafull')); ?>",
            success: function(hasil){
                for(var i = 0; i < hasil.length; i++){
                    // console.log(hasil[i]['kuota-kini']);
                    $(".kuota-kini-" + hasil[i]['id_mentor']).text(hasil[i]['kuota-kini']);
                    if(hasil[i]['kuota-kini'] >= hasil[i]['kuota'])
                    {
                        $(".status-penuh-" + hasil[i]['id_mentor']).show();
                        $(".badge-penuh-" + hasil[i]['id_mentor']).show();
                        $(".btn-penuh-" + hasil[i]['id_mentor']).show();

                        $(".btn-ikuti-" + hasil[i]['id_mentor']).hide();
                        $(".btn-diikuti-" + hasil[i]['id_mentor']).hide();
                    }else{
                        $(".status-tersedia-" + hasil[i]['id_mentor']).show();
                    }
                }
            }
        });

    });


    $(".btn-unfollow").click(function(){
        var id_mentor = $(this).attr("data-id");
        var nama_mentor = $(this).attr("data-nama");
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Seluruh data pelajaran anda berdasarkan mentor "' + nama_mentor + '" akan dihapus seluruhnya dan data anda tidak dapat dikembalikan.',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#343a40',
            confirmButtonText: '<i class="fas fa-sign-out-alt"> Berhenti mengikuti</i>',
            cancelButtonText: '<i class="fas fa-chalkboard-teacher"> Tetap mengikuti</i>',
            animation: false,
            customClass: {
                popup: "animated shake"
            }
            }).then((result) => {
                if (result.value) {
                    $(".form-unfollow-" + id_mentor).submit();
                }
            })
    });

    $(".thumbnail").click(function() {
        var id = $(this).attr("data-id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "<?php echo e(url('student/mentor/ambildata')); ?>",
            data: {
                id_mentor: id
            },
            success: function(hasil) {
                $(".modal-mentor").modal("show");
            }
        });
    });
</script>

<?php if(Session::has("berhasil_mengikuti")): ?>
<script>
    Swal.fire({
        title: 'Berhasil',
        type: "success",
        text: "Anda berhasil mengikuti mentor <?php echo e(Session::get("
        berhasil_mengikuti ")); ?>",
        animation: false,
        customClass: {
            popup: 'animated tada'
        }
    });
</script>
<?php endif; ?> 

<?php if(Session::has("berhasil_unfollow")): ?>
<script>
    Swal.fire({
        title: 'Berhasil',
        type: "success",
        text: "Anda berhenti mengikuti mentor <?php echo e(Session::get('berhasil_unfollow')); ?>",
        animation: false,
        customClass: {
            popup: 'animated tada'
        }
    });
</script>
<?php endif; ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/mentor.blade.php ENDPATH**/ ?>