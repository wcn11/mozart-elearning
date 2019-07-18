@extends('mentor.layouts.app')

@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Murid</h1>
    <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
            class="badge badge-danger">mengeluarkan</span> murid anda.</p>
            Kuota kelas anda : {{ $js }} / {{ Auth::guard("mentor")->user()->kuota }}
    <div class="text-right p-2">
        <button class="btn btn-outline-dark btn-kuota" data-id="{{ Auth::guard('mentor')->user()->kuota }}"><i class="fas fa-user-edit"></i> Edit Kuota Kelas</button>
    </div>
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
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Tanggal Mengkuti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($student); $i++)
                                
                                <tr class="text-center">
                                    <td>
                                        <div class="profil p-2">
                                            <img src="{{ url('images/'.$student[$i]['foto']) }}" class="rounded text-center gambar border-success border border-20" alt="your image">
                                        </div>
                                    </td>
                                    <td>{{ $student[$i]['id_student'] }}</td>
                                    <td>{{ $student[$i]['name'] }}</td>
                                    <td>{{ $student[$i]['email'] }}</td>
                                    <td>
                                        @if ( $student[$i]['no_telepon'] == null)
                                            belum diisi
                                        @else
                                        {{ $student[$i]['no_telepon'] }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $tanggal_follow[$i]['tanggal_mengikuti'] }}
                                    </td>
                                    <td>

                                        <button class=" btn btn-danger btn-delete" data-id="{{ $student[$i]['id_student'] }}">keluarkan</button>
                                        <form class="form-keluar-{{ $student[$i]['id_student'] }}" action="{{ route('mentor.unfollow', $student[$i]['id_student']) }}" method="post">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade modal-kuota" tabindex="-1" role="dialog" aria-labelledby="modal-kuota" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
            <div class="w-100 p-2 mb-3">
                
                <form class="form-kuota" action="{{ route('mentor.update_kuota') }}" method="post">

                    @csrf
                    <label for="validationServer05 font-weight-bold">Kuota kelas anda : {{ $js }} / {{ Auth::guard("mentor")->user()->kuota }}</label>
                    <input type="number" min="1" name="kuota" class="form-control input-kuota" value="{{ Auth::guard("mentor")->user()->kuota }}" id="input-kuota" placeholder="Kuota Kelas" required>
                    <div class="text-kuota d-none">
                        Harap isi kuota kelas
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="modal-footer">
                <button class="btn btn-info btn-update">Update</button>
                <button class="btn btn-dark" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scriptcss')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<style>
    .gambar {
        width: 100%;
        height: auto;
        /* min-height: 200px; */
        text-align: center;
    }
    .profil{
        width: 100%;
        text-align: center !important;
    }
    .sorting_1{
        width: 20%;
    }

</style>
@endsection

@section('scriptjs')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function () {

        $(".btn-kuota").click(function(){
            var kuota = $(this).attr("data-id");
            $(".modal-kuota").modal("show");
            $(".input-kuota").val(kuota);
        });

        $(".btn-update").click(function(){
            var kuota = $(".input-kuota").val();
            if(kuota == ""){
                $(this).addClass("is-invalid");
            }else{
                $(".form-kuota").submit();
            }
        });

        $("#tabel").DataTable();

        $(".btn-delete").click(function () {

            var id = $(this).attr("data-id");
            Swal.fire({
                title: 'Apakah anda yakin',
                text: "Seluruh data anda yang terkait dengan murid ini akan dihapus seluruhnya! Data anda tidak dapat dikembalikan!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Keluarkan!',
                }).then((result) => {
                if (result.value) {
                    $(".form-keluar-" + id).submit();
                }
            });

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

@if ($pesan_hapus = Session::get('berhasil_unfollow'))
<script>
    Swal.fire(
        'Berhasil!',
        'Anda berhasil mengeluarkan seorang murid!',
        'success'
    )

</script>
@endif

@if (Session::has('berhasil_update_kuota'))
<script>
    Swal.fire(
        'Berhasil!',
        'Berhasil update jumlah kuota kelas!',
        'success'
    )

</script>
@endif

@if (Session::has('gagal_update_kuota'))
<script>
    Swal.fire({
        title: 'Gagal!',
        text: 'Kuota kelas tidak boleh kurang dari jumlah murid yang sedang mengikuti anda!',
        type:'error',
        confirmButtonText: "Mengerti",
        confirmButtonColor: "#343a40",
        animation: false,
        customClass: {
            popup: "animated shake"
        }
    }
    )

</script>
@endif

@endsection
