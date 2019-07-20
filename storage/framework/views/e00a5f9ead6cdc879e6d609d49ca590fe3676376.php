<?php $__env->startSection('main-content'); ?>
    
    <div class="container">
        <div class="row">

                <div class="col-md-12 m-2">

                        <div class="card w-100 text-white border-0" style="">
                            <div class="card-body" style="background-color:#53d3e8;border-radius:10px;">
                    
                                <div class="input-group-prepend w-100 mb-2">
                                    <span class="input-group-text bg-dark text-white label-card">
                                                        <img src="https://img.icons8.com/color/48/000000/school-director.png" class="icon-colored"> Mentor</span>
                                </div><br>
                                <table id="tabel" class="table table-striped table-bordered table-hover table-borderless" style="width:100%">
                                    <thead class="text-white">
                                        <tr style="background-color:#0a336b;" class="text-center">
                                            <th>Profil</th>
                                            <th>ID Mentor</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Mapel</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Kuota</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                        <?php $__currentLoopData = $mentor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="w-25"><img src="<?php echo e(url("images/".$m->foto)); ?>" class="profil rounded"></td>
                                            <td><?php echo e($m->id_mentor); ?></td>
                                            <td><?php echo e($m->name); ?></td>
                                            <td><?php echo e($m->email); ?></td>
                                            <td>
                                                <?php if(empty($m->pelajaran)): ?>
                                                Mentor belum membuat pelajaran
                                                <?php else: ?>
                                                    <ul>
                                                        <?php $__currentLoopData = $m->pelajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><?php echo e($p->nama_pelajaran); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($m->created_at); ?></td>
                                            <td><?php echo e($m->kuota); ?></td>
                                            <td>
                                                <button data-id="<?php echo e($m->id_mentor); ?>" class="btn btn-danger btn-hapus">
                                                    <i class="fas fa-trash-alt"></i> hapus</a>
                                                </button>
                                                <form action="<?php echo e(route('master.delete_mentor', $m->id_mentor)); ?>" class="form-<?php echo e($m->id_mentor); ?>" method="post">
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
                text: "Seluruh data berdasarkan mentor ini akan terhapus sepenuhnya!",
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
                        'Berhasil menghapus mentor.',
                        'success'
                        )
                    }
                })
        });
    </script>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/master/mentor.blade.php ENDPATH**/ ?>