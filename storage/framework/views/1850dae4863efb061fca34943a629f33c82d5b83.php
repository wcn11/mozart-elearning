

<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Murid</h1>
    <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
            class="badge badge-danger">mengeluarkan</span> murid anda.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Murid</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center; text-transform:uppercase;">
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Sekolah</th>
                            <th>Nomor Telepon</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $student->student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr style="text-align:center;">
                            <td><?php echo e(HTML::image($dm->foto, 'Profile', array('class' => 'rounded-circle text-center img-fluid gambar'))); ?>

                            </td>
                            <td><?php echo e($dm->name); ?></td>
                            <td><?php echo e($dm->email); ?></td>
                            <td><?php echo e($dm->sekolah); ?></td>
                            <td>
                                <?php if( $dm->no_telepon == null): ?>
                                Data belum diisi
                                <?php else: ?>
                                <?php echo e($dm->no_telepon); ?>

                                <?php endif; ?>
                            </td>
                            <td>

                                <input type="hidden" id="id" value="<?php echo e($dm->id); ?>">
                                <button class=" btn btn-info btn-delete">delete</button>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">

<style>
    .gambar {
        width: 30%;
        height: auto;
        text-align: center;
    }

</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scriptjs'); ?>
<!-- Page level plugins -->
<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function () {
        $("#tabel").DataTable();
        // $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
        //                         'content')
        //                 }
        //             });
        // $.ajax({
        //     type: "post",
        //     url: "http://127.0.0.1:8000/mentor/data",
        //     dataType: "json",
        //     success: function(hasil){
        //         console.log(hasil);
        //         // var data = "";
        //         // hasil.forEach(function(entry) {

        //         //         $("#dataTable tbody").append(
        //         //         "<tr>" +
        //         //         "<td>"+ entry.name +"</td>" +
        //         //         "</tr>"
        //         //     );
        //         // });
        //     }
        // });

        $(".btn-delete").click(function () {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true,
            })

            swalWithBootstrapButtons.fire({
                title: 'Apakah anda yakin ?',
                text: "Anda tidak dapat mengulang kembali!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak, kembali!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        }
                    });
                    $.ajax({
                        type: 'post',
                        url: "http://127.0.0.1:8000/mentor/student/destroy",
                        data: {
                            // '_token': $('input[name=_token]').val(),
                            'id': $("#id").val()
                        },
                        success: function (data) {
                            // $('.item' + $('.did').text()).remove();
                            console.log(data);
                            location.reload();
                        },
                        error: function (er) {
                            console.log(er.errors);
                        }
                    });

                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        'Murid tetap didalam kelas',
                        'error'
                    )
                }
            })

        });
        // $(".btn-delete").click(function(){
        //     $.ajax({
        //             type: 'post',
        //             url:  "http://127.0.0.1:8000/mentor/student/destroy",
        //             data: {
        //                 // '_token': $('input[name=_token]').val(),
        //                 'id': $("#id").val()
        //             },
        //             success: function(data) {
        //                 $('.item' + $('.did').text()).remove();
        //                 console.log(data);
        //             },
        //             error: function(er){
        //                 console.log(er.errors);
        //             }
        //         });
        // });


        $(document).on('click', '.edit-modal', function () {
            $('#footer_action_button').text("Update");
            $('#footer_action_button').addClass('glyphicon-check');
            $('#footer_action_button').removeClass('glyphicon-trash');
            $('.actionBtn').addClass('btn-success');
            $('.actionBtn').removeClass('btn-danger');
            $('.actionBtn').addClass('edit');
            $('.modal-title').text('Edit');
            $('.deleteContent').hide();
            $('.form-horizontal').show();
            $('#fid').val($(this).data('id'));
            $('#n').val($(this).data('name'));
            $('#myModal').modal('show');
        });
        $(document).on('click', '.delete-modal', function () {
            $('#footer_action_button').text(" Delete");
            $('#footer_action_button').removeClass('glyphicon-check');
            $('#footer_action_button').addClass('glyphicon-trash');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').addClass('delete');
            $('.modal-title').text('Delete');
            $('.did').text($(this).data('id'));
            $('.deleteContent').show();
            $('.form-horizontal').hide();
            $('.dname').html($(this).data('name'));
            $('#myModal').modal('show');
        });

        $('.modal-footer').on('click', '.edit', function () {

            $.ajax({
                type: 'post',
                url: '/editItem',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#fid").val(),
                    'name': $('#n').val()
                },
                success: function (data) {
                    $('.item' + data.id).replaceWith("<tr class='item" + data.id +
                        "'><td>" + data.id + "</td><td>" + data.name +
                        "</td><td><button class='edit-modal btn btn-info' data-id='" +
                        data.id + "' data-name='" + data.name +
                        "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" +
                        data.id + "' data-name='" + data.name +
                        "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>"
                    );
                }
            });
        });
        $("#add").click(function () {

            $.ajax({
                type: 'post',
                url: '/addItem',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('input[name=name]').val()
                },
                success: function (data) {
                    if ((data.errors)) {
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors.name);
                    } else {
                        $('.error').addClass('hidden');
                        $('#table').append("<tr class='item" + data.id + "'><td>" + data
                            .id + "</td><td>" + data.name +
                            "</td><td><button class='edit-modal btn btn-info' data-id='" +
                            data.id + "' data-name='" + data.name +
                            "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" +
                            data.id + "' data-name='" + data.name +
                            "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>"
                        );
                    }
                },

            });
            $('#name').val('');
        });
        $('.modal-footer').on('click', '.delete', function () {
            $.ajax({
                type: 'post',
                url: '/deleteItem',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $('.did').text()
                },
                success: function (data) {
                    $('.item' + $('.did').text()).remove();
                }
            });
        });
    });

</script>
<?php if($pesan_hapus = Session::get('berhasil_dikeluarkan')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda berhasil mengeluarkan seorang murid!',
        'success'
    )

</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/mozart-learn/resources/views/mentor/pages/student/index.blade.php ENDPATH**/ ?>