@extends('mentor.layouts.app') @section('main-content')
<!-- Begin Page Content -->
<div class="container-fluid">



    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span class="badge badge-danger">mengeluarkan</span> murid anda.</p>
    <div class="col text-right mb-3 mt-3">

        <button class="btn btn-dark btn-update"> Update</button>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data diri</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive w-100">

                <form class="form-update" action="{{ route('mentor.profil_update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 grid-margin">
                            <div class="card" style="border:0;">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-info text-white">Nama</span>
                                            </div>
                                            <input type="text" class="form-control" name="name" placeholder="Nama" value="{{$mentor->name}}" required>
                                        </div>

                                        <div class="col-md-12 mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-info text-white">E-mail</span>
                                            </div>
                                            <input type="text" class="form-control" name="email" placeholder="Email anda" value="{{$mentor->email}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin">
                            <div class="card" style="border:0;">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="inputFile">Foto profil :  </label><br>
                                            <input type='file' name="file" value="{{$mentor->foto}}" id="inputFile" /> {{-- {!! HTML::image($mentor->foto, 'Foto Profil', array('class' => 'rounded-circle text-center img-fluid gambar')) !!} --}}
                                            <img id="image_upload_preview" src="{{url('images/'. $mentor->foto)}}" class="rounded-circle gambar" alt="your image" />

                                        </div>



                                        <div class="col-md-12 mb-3">

                                            <button class="btn btn-primary" data-target=".modal-ganti-password" type="button" data-toggle="modal">Ubah Password</button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="foto_lama" value="{{ $mentor->foto}}">

                </form>
            </div>



        </div>
    </div>
</div>

{{-- MODAL --}}

<div class="modal fade  modal-ganti-password" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col text-center">
                    Ganti Password
                </div> 
            </div>

            <div class="card">
                <div class="card-body">

                <div class="form-group row">
                    <label for="oldPassword" class="col-md-5 col-form-label text-md-right">{{ __('Password lama') }}</label>
                    
                    <span class=" current_password w-100 text-danger text-center">Password salah</span>
                    <div class="col-md-12">
                        <input id="current_password" type="password" class="form-control" name="current_password" value="{{ $oldPassword ?? old('oldPassword') }}" required autofocus>
                        
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('Password baru') }}</label>

                    <span class=" current_password w-100 text-danger text-center password_sama text-center">Password baru anda tidak boleh sama dengan password lama!</span>
                    <span class=" current_password w-100 text-danger password_tidak_sama text-center">Password baru anda tidak sama dengan password Konfirmasi!</span>
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-5 col-form-label text-md-right">{{ __('Konfirmasi password baru') }}</label>

                    <div class="col-md-12">
                        <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-6">
                        <button type="button" class="btn btn-info btn-ganti-password">
                                    {{ __('Ganti Password') }}
                                </button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection @section('scriptcss')

<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
    .gambar {
        width: 20%;
        height: auto;
    }
    
    .current_password {
        display: none;
    }
    
    .password_sama {
        display: none;
    }
    
    .password_tidak_sama {
        display: none;
    }
</style>
@endsection @section('scriptjs')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function() {
        readURL(this);
    });

    $('.btn-update').click(function() {
        var name = $("[name='name']").val();
        var email = $("[email='email']").val();

        if (name == "" && email == "") {
            $(".modal-update").modal();
        } else {
            $(".form-update").submit();
        }
    });

    $(".btn-ganti-password").click(function() {

        $(".current_password").hide();
        $(".password_sama").hide()
        $(".password_tidak_sama").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "{{ url('/mentor/password/change') }}",
            data: {
                current_password: $("[name='current_password']").val(),
                password: $("[name='password']").val(),
                password_confirmation: $("[name='password_confirmation']").val()
            },
            success: function(hasil) {
                if (hasil.password_salah) {
                    $(".current_password").show();
                } else if (hasil.password_sama) {
                    $(".password_sama").show();
                } else if (hasil.password_tidak_sama) {
                    $(".password_tidak_sama").show();
                } else if (hasil.password_berhasil) {
                    $(".modal-ganti-password").modal("hide");
                    Swal.fire(
                        'Berhasil!',
                        'Berhasil mengubah password!',
                        'success'
                    )
                } else {
                    console.log("");
                }
            }
        });
    });
</script>


@if ($pesan_hapus = Session::get('update_profil'))
<script>
    Swal.fire(
        'Berhasil!',
        'Anda berhasil mengupdate profil!',
        'success'
    )
</script>
@endif @endsection