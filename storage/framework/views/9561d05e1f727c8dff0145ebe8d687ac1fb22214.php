<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar soal</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info text-center"><?php echo e($soal_judul->judul); ?></h6>
            </div>
            <input type="hidden" name="soal_judul_id" value="<?php echo e($soal_judul->id); ?>">
            <div class="card-body">
                <input type="hidden" name="soal_id" value="<?php echo e($soal->id); ?>">
                <?php echo e($nomor); ?>. <?php echo e($soal->pertanyaan); ?><br>
                    <div class="form-check form-soal" data-link="<?php echo e(route('student.soal_update', $soal->id)); ?>">
                        <?php if($hasil[0]['jawaban'] == 1): ?>
                            <input class="form-check-input jawaban1 jawaban" type="radio" name="jawaban" checked id="exampleRadios1" value="1">
                        <?php else: ?>
                            <input class="form-check-input jawaban1 jawaban" type="radio" name="jawaban" id="exampleRadios1" value="1">
                        <?php endif; ?>
                        <label class="form-check-label" for="exampleRadios1">
                            <?php echo e($soal->pilihan1); ?>

                        </label>
                    </div>
                    <div class="form-check">
                        <?php if($hasil[0]['jawaban'] == 2): ?>
                            <input class="form-check-input jawaban2" type="radio" name="jawaban" checked id="exampleRadios2" value="2">
                        <?php else: ?>
                            <input class="form-check-input jawaban2" type="radio" name="jawaban" id="exampleRadios2" value="2">
                        <?php endif; ?>
                        <label class="form-check-label" for="exampleRadios2">
                                <?php echo e($soal->pilihan2); ?>

                        </label>
                    </div>
                    <div class="form-check">
                        <?php if($hasil[0]['jawaban'] == 3): ?>
                            <input class="form-check-input jawaban3" type="radio" name="jawaban" checked id="exampleRadios3" value="3">
                        <?php else: ?>
                            <input class="form-check-input jawaban3" type="radio" name="jawaban"  id="exampleRadios3" value="3">
                        <?php endif; ?>
                        <label class="form-check-label" for="exampleRadios3">
                                <?php echo e($soal->pilihan3); ?>

                        </label>
                    </div>
                    <div class="form-check">
                        <?php if($hasil[0]['jawaban'] == 4): ?>
                            <input class="form-check-input jawaban4" type="radio" name="jawaban" checked id="exampleRadios4" value="4">
                        <?php else: ?>
                            <input class="form-check-input jawaban4" type="radio" name="jawaban" id="exampleRadios4" value="4">
                        <?php endif; ?>
                        <label class="form-check-label" for="exampleRadios4">
                            <?php echo e($soal->pilihan4); ?>

                        </label>
                    </div>
                    <div class="form-check">
                        <?php if($hasil[0]['jawaban'] == 5): ?>
                            <input class="form-check-input jawaban5" type="radio" name="jawaban" checked id="exampleRadios5" value="5">
                        <?php else: ?>
                            <input class="form-check-input jawaban5" type="radio" name="jawaban" id="exampleRadios5" value="5">
                        <?php endif; ?>
                        <label class="form-check-label" for="exampleRadios5">
                            <?php echo e($soal->pilihan5); ?>

                        </label>
                    </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <?php $id = Crypt::encrypt($soal_judul->id); ?>
        <a class="btn btn-outline-info text-right btn-selesai" href="<?php echo e(route('student.soal_edit',$id)); ?>">Update</a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>
<script>
    $(document).ready(function(){
        
        $(".jawaban1").click(function(){
            jawaban1 = $(this).val();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "<?php echo e(url('/student/soal/update')); ?>",
                data: {
                    jawaban: jawaban1,
                    soal_id: $("[name='soal_id']").val(),
                    soal_judul_id: $("[name='soal_judul_id']").val()
                },
                success: function(hasil1){
                    console.log(hasil1);
                    // location.reload(true);
                }
            });

            console.log(jawaban1)
        });
        $(".jawaban2").click(function(){
            jawaban2 = $(this).val();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "<?php echo e(url('/student/soal/update')); ?>",
                data: {
                    jawaban: jawaban2,
                    soal_id: $("[name='soal_id']").val(),
                    soal_judul_id: $("[name='soal_judul_id']").val()
                },
                success: function(hasil2){
                    console.log(hasil2);
                    // location.reload(true);
                }
            });
            console.log(jawaban)
        });
        $(".jawaban3").click(function(){
            jawaban3 = $(this).val();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "<?php echo e(url('/student/soal/update')); ?>",
                data: {
                    jawaban: jawaban3,
                    soal_id: $("[name='soal_id']").val(),
                    soal_judul_id: $("[name='soal_judul_id']").val()
                },
                success: function(hasil3){
                    console.log(hasil3);
                    // location.reload(true);
                }
            });
            console.log(jawaban3)
        });
        $(".jawaban4").click(function(){
            jawaban4 = $(this).val();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "<?php echo e(url('/student/soal/update')); ?>",
                data: {
                    jawaban: jawaban4,
                    soal_id: $("[name='soal_id']").val(),
                    soal_judul_id: $("[name='soal_judul_id']").val()
                },
                success: function(hasil4){
                    console.log(hasil4);
                    // location.reload(true);
                }
            });
            console.log(jawaban4)
        });
        $(".jawaban5").click(function(){
            jawaban5 = $(this).val();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "<?php echo e(url('/student/soal/update')); ?>",
                data: {
                    jawaban: jawaban5,
                    soal_id: $("[name='soal_id']").val(),
                    soal_judul_id: $("[name='soal_judul_id']").val()
                },
                success: function(hasil5){
                    console.log(hasil5);
                    // location.reload(true);
                }
            });
            console.log(jawaban5)
        });

    });


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/soal_edit_persoal.blade.php ENDPATH**/ ?>