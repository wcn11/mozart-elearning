@extends('student.layouts.app') 

@section('main-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update data diri</h1>
    <p class="mb-4"></p>
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

            <form class="form-update" action="{{ route('student.profil_update')}}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Nama" value="{{$student->name}}" required>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">E-mail</span>
                                        </div>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Email anda" value="{{$student->email}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin">
                        <div class="card" style="border:0;">
                            <div class="card-body">
                                <div class="form-row">
                                    <label for="inputFile">Foto profil :  </label><br>
                                <input type='file' name="file" value="{{$student->foto}}" id="inputFile" />
                    {{-- {!! HTML::image($mentor->foto, 'Foto Profil', array('class' => 'rounded-circle text-center img-fluid gambar')) !!} --}}
                            <img id="image_upload_preview" src="{{url('images/'. $student->foto)}}" class="rounded-circle gambar" alt="your image" />
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <input type="hidden" name="foto_lama" value="{{ $student->foto}}">
                </form>
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}

<div class="modal fade bd-example-modal-xl modal-materi" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title" style="font-size: 15px; text-align:center; font-weight:bold; text-transform:capitalize;"></h5>
                </div>
                <button type="button" class="close btn-tutup" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-konfirmasi" onclick="event.preventDefault();document.getElementById('form-hapus').submit();" data-dismiss="modal">Hapus</button>
                <button type="button" class="btn btn-info btn-tutup" data-dismiss="modal">Tutup</button>
                <form id="form-hapus" action="#" method="post">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-update" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      Anda harus melengkapi seluruh field!
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

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });

    $('.btn-update').click(function(){
        var name = $("[name='name']").val();
        var email = $("[email='email']").val();

        if(name == "" && email == ""){
            $(".modal-update").modal();
        }else{
            $(".form-update").submit();
        }
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
@endif

@endsection