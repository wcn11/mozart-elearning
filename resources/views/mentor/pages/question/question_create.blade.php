@extends('mentor.layouts.app') @section('main-content')
<!-- Begin Page Content -->
<div class="container-fluid ">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Soal Editor</h1>

        <div class="clearfix">

            <button class="btn btn-success btn-lg mb-4 mr-4 btn-upload float-right">Upload soal</button>

        </div>

    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Judul soal</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $soal_judul->judul }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pelajaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $soal_judul->pelajaran->nama_pelajaran }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form class="form form-soal" action="{{ route('mentor.soal_update') }}" class="col-md-12" method="POST">
            @csrf

            <div class="pesan-error"></div>
            <input type="hidden" id="kode_judul_soal" name="kode_judul_soal" value="{{ $soal_judul->kode_judul_soal }}">
            <div class="card-body" id="containersoal">

                @for($i = 0; $i < $soal_judul->jumlah_soal; $i++)


                    <h6 class="m-0 font-weight-bold text-info">Soal ke {{ $i + 1 }}</h6>
                    <br>
                    <div class="row">
                        <div class="col-md-6 grid-margin">
                            <div class="form-group ">
                                <div class=" bg-danger pesan-error"></div>
                                <label for="pertanyaan">Pertanyaan ke {{ $i + 1 }}<span class="text-danger control-label">*</span></label>
                                <input type="text" required="required" name="pertanyaan" data-id="{{ $soal[$i]['kode_soal'] }}" class="form-control pertanyaan" id="pertanyaan-{{ $i }}-{{ $soal[$i]['kode_soal'] }}" aria-describedby="textHelp" placeholder="Enter text">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputtext1">Pilihan ke 1  <span class="text-danger">*</span></label>
                                <input type="text" required="required" name="pilihan1" class="form-control pilihan1" data-id="{{ $soal[$i]['kode_soal'] }}" id="pilihan1-{{ $i }}-{{ $soal[$i]['kode_soal'] }}" aria-describedby="textHelp" placeholder="Enter text">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputtext1">Pilihan ke 2  <span class="text-danger">*</span></label>
                                <input type="text" required="required" name="pilihan2" class="form-control pilihan2" data-id="{{ $soal[$i]['kode_soal'] }}" id="pilihan2-{{ $i }}-{{ $soal[$i]['kode_soal'] }}" aria-describedby="textHelp" placeholder="Enter text">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputtext1">Pilihan ke 3  <span class="text-danger">*</span></label>
                                <input type="text" required="required" name="pilihan3" class="form-control pilihan3" data-id="{{ $soal[$i]['kode_soal'] }}" id="pilihan3-{{ $i }}-{{ $soal[$i]['kode_soal'] }}" aria-describedby="textHelp" placeholder="Enter text">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputtext1">Pilihan ke 4  <span class="text-danger">*</span></label>
                                <input type="text" required="required" name="pilihan4" class="form-control pilihan4" data-id="{{ $soal[$i]['kode_soal'] }}" id="pilihan4-{{ $i }}-{{ $soal[$i]['kode_soal'] }}" aria-describedby="textHelp" placeholder="Enter text">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputtext1">Pilihan ke 5  <span class="text-danger">*</span></label>
                                <input type="text" required="required" name="pilihan5" class="form-control pilihan5" data-id="{{ $soal[$i]['kode_soal'] }}" id="pilihan5-{{ $i }}-{{ $soal[$i]['kode_soal'] }}" aria-describedby="textHelp" placeholder="Enter text">
                            </div>

                            <div class="form-group">
                                <label for="pilihan_benar">Pilihan Benar<span class="text-danger">*</span></label>
                                <select class="form-control pilihan_benar is-valid" name="pilihan_benar" data-id="{{ $soal[$i]['kode_soal'] }}" required="required">
                                    @for($a = 1; $a <= 5; $a++)
                                        <option value="{{ $a }}">Pilihan {{ $a }}</option>
                                    @endfor
                                </select>
                                <p class="help-block"></p>
                                @if($errors->has('pilihan_benar'))
                                <p class="help-block">
                                    {{ $errors->first('pilihan_benar') }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                @endfor

        </form>
        <br>
        </div>
    </div>
    </form>
</div>

<input type="hidden" id="jumlah-soal" value="{{ $soal_judul->jumlah_soal }}">

@endsection @section('scriptcss')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">

<style>
    #publish:hover {
        cursor: pointer;
    }
    .notif{
        position: fixed;
        top: 0%;
        z-index: 99;
    }
</style>
@endsection @section('scriptjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {

        Swal.fire(
        'Autosave!',
        'Demi kenyamanan, pekerjaan anda akan di save otomatis oleh sistem!<br><br>Centang hijau (<i class="fas fa-check text-success"></i>) menandakan inputan telah di save. <br><br>Pastikan seluruh field telah tercentang hijau',
        'info'
        )

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        var jam = today.getHours();
        var menit = today.getMinutes();
        var detik = today.getSeconds();

        var jumlah_soal = $("#jumlah-soal").val();

        today = dd + '/' + mm + '/' + yyyy + " | " + jam + ":" + menit + ":" + detik;
        $("#tanggal").val(today);

        $('.summernote').summernote({
            height: 600, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });

        $(".btn-upload").click(function(){
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Upload!',
                cancelButtonText: 'belum selesai'
                }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ url('mentor/soal') }}";
                }
            })

        });

        // start auto save !! start auto save !! start auto save !! start auto save !!

        $(".pertanyaan").on("change", function(){
            var kode_judul_soal = $("#kode_judul_soal").val();
            var kode_soal = $(this).attr("data-id");
            var pertanyaan = $(this).val();
            var id = $(this).attr("id");

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ url('mentor/soal/autosave/pertanyaan') }}",
                    data:{
                        kjs: kode_judul_soal,
                        ks: kode_soal,
                        pertanyaan: pertanyaan
                    },
                    success: function(hasil){
                        if(hasil == "berhasil"){
                            $("#" + id).addClass("is-valid");
                           
                        }
                    }
                });
        });

        $(".pilihan1").on("change", function(){

            var kode_soal = $(this).attr("data-id");
            var pilihan1 = $(this).val();
            var id = $(this).attr("id");

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ url('mentor/soal/autosave/pilihan1') }}",
                    data:{
                        ks: kode_soal,
                        pilihan1: pilihan1
                    },
                    success: function(hasil){
                        $("#" + id).addClass("is-valid");
                    }
                });
            });

        $(".pilihan2").on("change", function(){

            var kode_soal = $(this).attr("data-id");
            var pilihan2 = $(this).val();
            var id = $(this).attr("id");

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ url('mentor/soal/autosave/pilihan2') }}",
                    data:{
                        ks: kode_soal,
                        pilihan2: pilihan2
                    },
                    success: function(hasil){
                        $("#" + id).addClass("is-valid");
                    }
                });
        });

        $(".pilihan3").on("change", function(){

            var kode_soal = $(this).attr("data-id");
            var pilihan3 = $(this).val();
            var id = $(this).attr("id");

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ url('mentor/soal/autosave/pilihan3') }}",
                    data:{
                        ks: kode_soal,
                        pilihan3: pilihan3
                    },
                    success: function(hasil){
                        $("#" + id).addClass("is-valid");
                    }
                });
        });

        $(".pilihan4").on("change", function(){

            var kode_soal = $(this).attr("data-id");
            var pilihan4 = $(this).val();
            var id = $(this).attr("id");

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ url('mentor/soal/autosave/pilihan4') }}",
                    data:{
                        ks: kode_soal,
                        pilihan4: pilihan4
                    },
                    success: function(hasil){
                        $("#" + id).addClass("is-valid");
                    }
                });
        });

        $(".pilihan5").on("change", function(){

            var kode_soal = $(this).attr("data-id");
            var pilihan5 = $(this).val();
            var id = $(this).attr("id");

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ url('mentor/soal/autosave/pilihan5') }}",
                    data:{
                        ks: kode_soal,
                        pilihan5: pilihan5
                    },
                    success: function(hasil){
                        $("#" + id).addClass("is-valid");
                    }
                });
        });

        $(".pilihan_benar").on("change", function(){

            var kode_soal = $(this).attr("data-id");
            var pilihan_benar = $(this).val();

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ url('mentor/soal/autosave/pilihan_benar') }}",
                    data:{
                        ks: kode_soal,
                        pilihan_benar: pilihan_benar
                    },
                    success: function(hasil){
                        // console.log(hasil);
                    }
                });
        });


    });
</script>



@if($pesan_update = Session::get('success_update_materi'))
<script>
    berhasilUpdateMateri()
</script>
@endif @endsection