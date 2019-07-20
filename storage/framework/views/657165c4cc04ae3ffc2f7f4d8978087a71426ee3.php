<?php $__env->startSection('main-content'); ?>
    
    <div class="container">
        <div class="row">

                <div class="col-md-12 m-2">

                        <div class="card w-100 text-white border-0" style="">
                            <div class="card-body" style="background-color:#53d3e8;border-radius:10px;">
                    
                                <div class="input-group-prepend w-100 mb-2">
                                    <span class="input-group-text bg-dark text-white label-card">
                                                        <img src="https://img.icons8.com/color/48/000000/student-male.png" class="icon-colored"> Student</span>
                                </div><br>
                                <table id="tabel" class="table table-striped table-bordered table-hover table-borderless" style="width:100%">
                                    <thead class="text-white">
                                        <tr style="background-color:#0a336b;" class="text-center">
                                            <th>Profil</th>
                                            <th>ID Student</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Mapel</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Mentor</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                        <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="w-25"><img src="<?php echo e(url("images/".$s->foto)); ?>" class="profil rounded"></td>
                                            <td><?php echo e($s->id_student); ?></td>
                                            <td><?php echo e($s->name); ?></td>
                                            <td><?php echo e($s->email); ?></td>
                                            <td>
                                                <ul>
                                                    <?php $__currentLoopData = $s->mentor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                        <?php $__currentLoopData = $m1->pelajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><?php echo e($p->nama_pelajaran); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </td>
                                            <td><?php echo e($s->tanggal_daftar); ?></td>
                                            <td>
                                                <ul>
                                                    <?php $__currentLoopData = $s->mentor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($m->name); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </td>
                                            <td>
                                                <button data-id="<?php echo e($s->id_student); ?>" class="btn btn-danger btn-hapus">
                                                    <i class="fas fa-trash-alt"></i> hapus</a>
                                                </button>
                                                <form action="<?php echo e(route('master.delete_student', $s->id_student)); ?>" class="form-<?php echo e($s->id_student); ?>" method="post">
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
                text: "Seluruh data berdasarkan student ini akan terhapus sepenuhnya!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
                }).then((result) => {
                    if (result.value) {
                        $(".form-" + id).submit();

                        Swal.fire(
                        'Terhapus!',
                        'Berhasil menghapus student.',
                        'success'
                        )
                    }
                })
        });
    </script>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/master/student.blade.php ENDPATH**/ ?>