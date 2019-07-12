<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar soal</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info text-center"><?php echo e($soal_judul->judul); ?></h6>
                <p class="text-center"><?php echo e($soal->currentPage()); ?>/<?php echo e($soal_judul->jumlah_soal); ?></p>
                Soal akan berakhir pada : <?php echo e($soal_judul->tanggal_selesai); ?>

            </div>
            <input type="hidden" name="soal_judul_id" value="<?php echo e($soal_judul->id); ?>">
            <div class="card-body">
                <?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="soal_id" value="<?php echo e($s->id); ?>">
                <?php echo e($soal->currentPage()); ?>. <?php echo e($s->pertanyaan); ?> <br>
                    <div class="form-check form-soal" data-link="<?php echo e(route('student.soal_update', $s->id)); ?>">
                            <input class="form-check-input jawaban1" type="radio" name="jawaban" id="exampleRadios1" value="1">
                            <label class="form-check-label" for="exampleRadios1">
                              <?php echo e($s->pilihan1); ?>

                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input jawaban2" type="radio" name="jawaban" id="exampleRadios2" value="2">
                            <label class="form-check-label" for="exampleRadios2">
                                    <?php echo e($s->pilihan2); ?>

                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input jawaban3" type="radio" name="jawaban"  id="exampleRadios3" value="3">
                            <label class="form-check-label" for="exampleRadios3">
                                    <?php echo e($s->pilihan3); ?>

                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input jawaban4" type="radio" name="jawaban" id="exampleRadios4" value="4">
                            <label class="form-check-label" for="exampleRadios4">
                              <?php echo e($s->pilihan4); ?>

                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input jawaban5" type="radio" name="jawaban" id="exampleRadios5" value="5">
                            <label class="form-check-label" for="exampleRadios5">
                              <?php echo e($s->pilihan5); ?>

                            </label>
                          </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" value="<?php echo e($soal->total()); ?>" name="jumlah_soal">
            </div>
        </div>
    </div>
    <?php if($soal->currentPage() == $soal_judul->jumlah_soal): ?>
    <div class="text-center">
        <?php $id = Crypt::encrypt($soal_judul->id); ?>
    <a class="btn btn-outline-info text-right btn-selesai" href="<?php echo e(route('student.soal_edit',$id)); ?>">Selesai</a>
</div>
    <?php else: ?>
    <div class="text-center">
    <a class="btn btn-info text-right text-white btn-selanjutnya" data-link="<?php echo e($soal->nextPageUrl()); ?>">Selanjutnya</a>
</div>
    <?php endif; ?>

    <span class="bg-danger text-white p-2 rounded w-100 belum-memilih">Anda belum memilih.<br>Harap pilih salah satu dari jawaban yang disediakan!!</span>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
<style>
.belum-memilih{
    position: fixed;
    top: 0px;
    text-align: center;

    max-height: 40%;
}
.btn-selanjutnya:hover{
    cursor: pointer;
}
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>
<script>
    $(document).ready(function(){

        $(".belum-memilih").hide();
        
        $(".jawaban1").click(function(){
            jawaban1 = $(this).val();
            $(".belum-memilih").hide();
            
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
                },
                errors: function(hasil){
                    console.log(hasil.errors);
                }
            });

            console.log(jawaban1)
        });
        $(".jawaban2").click(function(){
            jawaban2 = $(this).val();
            $(".belum-memilih").hide();
            
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
            console.log(jawaban2)
        });
        $(".jawaban3").click(function(){
            jawaban3 = $(this).val();
            $(".belum-memilih").hide();
            
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
            $(".belum-memilih").hide();
            
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
            $(".belum-memilih").hide();
            
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

        $(".btn-selanjutnya").click(function(event){

            if($("[name='jawaban']").is(":checked")){
                console.log("ter ceklis");
                var link = $(this).attr('data-link');
                console.log(link);
                $(this).attr("href", link);
            }else{
                console.log("belum di ceklis");
                $(".belum-memilih").show();
            }
        });



    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/soal_mengerjakan.blade.php ENDPATH**/ ?>