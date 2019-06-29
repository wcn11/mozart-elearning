@extends('mentor.layouts.app')

@section('main-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Materi Editor</h1>
    <p class="mb-4">Update makalah anda dengan sebaik baiknya, dan biarkan pada muridmu membacanya kembali.</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
            <form class="form" action="{{ route('mentor.materi_upload_aksi') }}" class="col-md-12" method="POST">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Murid</h6>
        </div>
            <div class="card-body">

                @csrf
                <div class="row">
                    <div class="col-md-6 grid-margin">
                        <div class="card" style="border:0;">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">Judul</span>
                                        </div>
                                        <input type="text" class="form-control" name="judul" id="validationServer01"
                                            placeholder="Judul materi" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">Kategori pelajaran</span>
                                        </div>
                                        <select class="custom-select" name="pelajaran_id" required>
                                            @foreach ($pelajaran as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama_pelajaran }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin">
                        <div class="card" style="border:0;">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3" style="text-align:end;">

                                            <div class="input-group-prepend invisible">
                                                    <span class="input-group-text bg-info text-white">Hidden</span>
                                                </div>
                                        <button type="submit" class="btn btn-lg btn-success w-25" required>Publikasi</button>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">Tanggal publikasi</span>
                                        </div>
                                        <input type="text" class="form-control" id="tanggal"
                                             required disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <h4 class="card-title">Materi editor</h4>
            <textarea id="summernote" name="materi">
                </textarea>
        </div>
    </div>
</form>
</div>

@endsection


@section('scriptcss')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">

<style>
    #publish:hover {
        cursor: pointer;
    }

</style>
@endsection

@section('scriptjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            placeholder: "Masukkan materi",
            height: 500, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });
        var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

var jam = today.getHours();
var menit = today.getMinutes();
var detik = today.getSeconds();

today = dd + '/' + mm + '/' + yyyy + " | " + jam + ":" + menit + ":" + detik;
$("#tanggal").val(today);

});
</script>

@if($pesan_update = Session::get('success_update_materi'))
<script>
    berhasilUpdateMateri()

</script>
@endif
@endsection
