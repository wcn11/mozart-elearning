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

                <?php $__currentLoopData = $mentor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_key => $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div id="<?php echo e($m->id_mentor); ?>" class="flip flip-<?php echo e($m->id_mentor); ?> col-lg-3 col-md-4 col-xs-6 thumb m-3">
                        <div class="flip-card" data-id="<?php echo e($m->id_mentor); ?>">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img class="rounded" src="<?php echo e(url('/images/'.$m->foto)); ?>" alt="Avatar" style="width:100%;height:100%;">
                                    <div class="badge-keterangan">
                                        
                                    </div>
                                    
                                    <div class="kiri-bawah bg-white rounded" style="width:88%;">
                                        <p class="text-dark text-capitalize text-left m-2"><?php echo e($m->name); ?></p>
                    
                                    </div>
                                </div>
                                <div class="flip-card-back p-3 rounded">
                                    <h4 class="font-weight-bold text-capitalize"><?php echo e($m->name); ?></h4>
                                    <p><?php echo e($m->email); ?></p>
                                    <?php if(array_keys($js[$m_key])[0] == $m->id_mentor): ?>
                                        Jumlah Murid : <?php echo e($js[$m_key][$m->id_mentor]); ?> / <span> <?php echo e($m->kuota); ?> </span>
                                    <?php else: ?>
                                        Jumlah Murid : 0 
                                    <?php endif; ?>
                                    <div class="w-100 p-2 bg-dark rounded text-left overflow-scroll" style="height: 59%; min-height: 59%; max-height:59%;overflow-x:hidden;">
                                        <!-- Nav tabs -->
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        
                                                        <?php $__currentLoopData = $m->pelajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a class="nav-link text-white" id="v-pills-<?php echo e($m->id_mentor); ?>-tab" data-toggle="pill" href="#v-pills-<?php echo e($m->id_mentor); ?>-<?php echo e($mpl->nama_pelajaran); ?>" role="tab" aria-controls="v-pills-<?php echo e($m->id_mentor); ?>" aria-selected="true"><?php echo e($mpl->nama_pelajaran); ?></a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-8 text-center ml-4">
                                                    <div class="tab-content bg-info rounded" id="v-pills-tabContent">
                                                        <?php $__currentLoopData = $m->pelajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mpl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="tab-pane fade p-2 text-left" id="v-pills-<?php echo e($m->id_mentor); ?>-<?php echo e($mpl->nama_pelajaran); ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo e($m->id_mentor); ?>-tab">
                                                                <?php echo e($mpl->nama_pelajaran); ?>

                                                                <hr>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>                                
                                    </div>
                                    <a class="btn btn-danger mt-1 btn-sm btn-unfollow btn-unfollow-<?php echo e($m->id_mentor); ?>" href="javascript:void(0)" data-id="<?php echo e($m->id_mentor); ?>" data-nama="<?php echo e($m->name); ?>"><i class="fa fa-sign-out-alt"></i> Berhenti ikuti mentor</a>
                                </div>
                                <form class="form-unfollow-<?php echo e($m->id_mentor); ?>" action="<?php echo e(route("student.unfollow", $m->id_mentor)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                                <a class="btn-diikuti-<?php echo e($m->id_mentor); ?> btn-diikuti" href="javascript:void(0)"><button class="btn btn-outline-success diikuti text-center shadow" style="width:90%;"><i class="fas fa-map-pin"></i> Diikuti</button></a>
                            
                                <a class="btn-ikuti-<?php echo e($m->id_mentor); ?> btn-ikuti" href="<?php echo e(route('student.ikuti_mentor', $m->id_mentor)); ?>"><button class="btn ikuti btn-info text-center ikuti-<?php echo e($m->id_mentor); ?> shadow" style="width:90%;"><i class="fas fa-door-open"></i> Ikuti</button></a>
                                <button class="btn btn-danger penuh shadow btn-penuh btn-penuh-<?php echo e($m->id_mentor); ?>" type="button" style="width:90%;"><i class="fas fa-user-alt-slash"></i> Penuh</button>
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

    .penuh, .ikuti, .diikuti{
        /* margin-top: -18%; */
        display: none;
    }

    .kiri-bawah {
        position: absolute;
        bottom: 8px;
        left: 16px;
    }
    .badge-keterangan{
        position: absolute;
        bottom: 20%;
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

        $(".btn-ikuti").show();
        $(".btn-diikuti").hide();
        $(".btn-unfollow").hide();
        $(".btn-penuh").hide();
        $(".badge-penuh").hide();
        $(".badge-diikuti").hide();
        $(".badge-ikuti").hide();

        $(".flip-card").hover(function(){

            var id_mentor = $(this).attr("data-id");
            // $(".btn-diikuti-" + id_mentor).toggle();
            

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "<?php echo e(url('student/mentor/ambildata')); ?>",
                data: {
                    id_mentor : id_mentor
                },
                success: function(hasil){
                    console.log(hasil.kuota);
                    if(hasil.kuota == "ada"){

                        if(hasil.jumlah_kuota <= hasil.jumlah_student){
                            $(".btn-ikuti-" + id_mentor).hide();
                            
                            $(".btn-penuh-" + id_mentor).toggle();
                            $(".btn-penuh-" + id_mentor).css("margin-top"," 0%");
                            $(".btn-unfollow-" + id_mentor).show();
                        }else{
                            $(".btn-unfollow-" + id_mentor).show();
                            $(".btn-diikuti-" + id_mentor).toggle();
                        }
                    }else if(hasil.kuota == "kosong"){
                        $(".ikuti-" + id_mentor).toggle();
                        $(".btn-penuh-" + id_mentor).hide();
                        $(".btn-unfollow-" + id_mentor).hide();
                        console.log(hasil.kuota);
                    }

                }
            });

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
                console.log(hasil);
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