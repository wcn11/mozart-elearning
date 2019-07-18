<?php $__env->startSection('main-content'); ?>

<div class="container-fluid">

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"></h1>
        <div class="col text-right mb-3 mt-3">
    
            
        </div>
        
    <!-- DataTales Example -->
    <div class="card shadow mb-4 animated bounceInDown">
        <div class="card-header py-3 text-center">
            <h6 class="m-0 font-weight-bold text-primar bounce animated">Tabel pelajaran</h6>
        </div>
        <div class="card-body">
            
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <?php for($i = 0; $i < $jumlah; $i++): ?>
                            <a class="nav-item nav-link nav-mentor" data-id="<?php echo e($data[$i][0]['id_mentor']); ?>" id="nav-<?php echo e($data[$i][0]['id_mentor']); ?>-tab" data-toggle="tab" href="#nav-<?php echo e($data[$i][0]['id_mentor']); ?>" role="tab" aria-controls="nav-<?php echo e($data[$i][0]['id_mentor']); ?>" aria-selected="true"><?php echo e($data[$i][0]['name']); ?></a>
                        <?php endfor; ?>
                    </div>
                </nav>
                <div class="tab-content tab-content-mentor" id="nav-tabContent">
                    
                </div>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>

<style></style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "get",
            url: "<?php echo e(url('student/pelajaran/ambildata')); ?>",
            data:{
                id_mentor : $("#nav-tab a:first-child").attr("data-id")
            },
            success: function(hasil){

                $(".tab-content-mentor").text("");
                for(var i = 0; i < hasil.length; i++){
                    $(".tab-content-mentor").append(
                        "<div class='tab-pane fade p-2 m-2 active show' id='nav-" + hasil[i]['id_mentor'] + "' role='tabpanel'>" +
                            hasil[i]['nama_pelajaran'] +
                        "</div>"
                    );
                }
            }
        });

        $(".nav-mentor").click(function(){

            var id = $(this).attr("data-id");

            $.ajax({
                type: "get",
                url: "<?php echo e(url('student/pelajaran/ambildata')); ?>",
                data:{
                    id_mentor : id
                },
                success: function(hasil){
                    // console.log(hasil[0]['kode_mapel']);
                        $(".tab-content-mentor").text("");
                    for(var i = 0; i < hasil.length; i++){

                        $(".tab-content-mentor").append(
                            "<div class='tab-pane fade p-2 m-2 active show' id='nav-" + hasil[i]['id_mentor'] + "' role='tabpanel'>" +
                                hasil[i]['nama_pelajaran'] +
                            "</div>"
                        );
                    }
                }
            });
        });


        $("#nav-tab a:first-child").addClass("active");
        $(".tab-content .tab-pane:first-child").addClass('active show');
    })
    
</script>

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