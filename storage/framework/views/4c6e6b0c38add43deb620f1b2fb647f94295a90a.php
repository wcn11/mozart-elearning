<?php $__env->startSection('main-content'); ?>
    
    <div class="container">
        <div class="row">

                <div class="col-md-12 m-2">

                        <div class="card w-100 text-white border-0" style="">
                            <div class="card-body" style="background-color:#53d3e8;border-radius:10px;">
                    
                                <div class="input-group-prepend w-100 mb-2">
                                    <span class="input-group-text bg-dark text-white label-card">
                                                        <img src="https://img.icons8.com/color/48/000000/e-learning.png" class="icon-colored"> Materi</span>
                                </div><br>
                                <table id="tabel" class="table table-striped table-bordered table-hover table-borderless" style="width:100%">
                                    <thead class="text-white">
                                        <tr style="background-color:#0a336b;" class="text-center">
                                            <th>Cover</th>
                                            <th>Kode Materi</th>
                                            <th>Mentor</th>
                                            <th>Pelajaran</th>
                                            <th>Judul materi</th>
                                            <th>Materi</th>
                                            <th>Dibuat</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                        <?php $__currentLoopData = $materi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="w-25"><img src="<?php echo e(url("images/".$m->cover)); ?>" class="profil rounded"></td>
                                            <td><?php echo e($m->kode_materi); ?></td>
                                            <td><?php echo e($m->materi_ke_mentor["name"]); ?></td>
                                            <td> <?php echo e($m->pelajaran['nama_pelajaran']); ?>

                                            </td>
                                            <td><?php echo e($m->judul_materi); ?></td>
                                            <td><a class="btn btn-success" href="<?php echo e(route('master.baca_materi', Crypt::encrypt($m->kode_materi))); ?>"><i class="fas fa-book-reader"></i> lihat materi</a></td>
                                            <td><?php echo e($m->dibuat); ?>

                                            </td>
                                            <td>
                                                <button data-id="<?php echo e($m->kode_materi); ?>" class="btn btn-danger btn-hapus"><i class="fas fa-trash-alt"> Hapus</i></button>
                                                <form action="<?php echo e(route('master.delete_materi', $m->kode_materi)); ?>" method="post" class="form-<?php echo e($m->kode_materi); ?>">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                    
                    </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
    <style>
    .label-card {
	border-radius: 10px;
	border: 0px;
}
.profil{
    width: 100%;
}
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>
    <script>
        $(document).ready( function () {
            $('#tabel').DataTable();
            $('#tabel_std').DataTable();
        } );
        
        $(".btn-hapus").click(function(){
            var id = $(this).attr("data-id");
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Materi tidak akan bisa dikembalikan!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
                }).then((result) => {
                    if (result.value) {
                        $(".form-" + id).submit();

                    }
                })
        });
    </script>

    <?php if(Session::has("materi_terhapus")): ?>
        <script>
            Swal.fire(
                        'Terhapus!',
                        'Berhasil menghapus materi.',
                        'success'
                        )
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/master/materi.blade.php ENDPATH**/ ?>