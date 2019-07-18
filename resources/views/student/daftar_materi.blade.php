@extends('student.layouts.app')

@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><img src="https://img.icons8.com/color/48/000000/todo-list.png" style="width:30px;"> Daftar Materi</h1>
     <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
            class="badge badge-danger">mengeluarkan</span> murid anda.</p>  

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><img src="https://img.icons8.com/color/48/000000/student-male.png" width="30px"/>Murid</h6>
        </div>
        <div class="card-body container-utama text-left">

            <div class="row">
                
                @foreach ($materi as $m)
                    
                    <div class="col-md-3">
                        <div class="card materi rounded">
                            <a href="{{ route('student.materi_read', $m->kode_materi) }} ">
                                <img src="{{ url('/images/'.$m->cover) }}" alt="John" style="width:100%"  data-toggle="tooltip" data-placement="top" title="{{ $m->judul_materi }}">
                                <p class="title p-2" data-toggle="tooltip" data-placement="top" title="{{ $m->judul_materi }}">{{ $m->judul_materi }}</p>
                            </a>
                            <p><img src="https://img.icons8.com/color/48/000000/math.png" class="icon-colored"> {{ $m->pelajaran->nama_pelajaran }}</p>
                            <p>
                                <p class="badge badge-info">{{ $m->dibuat }}</p>
                                <a href="{{ route('student.materi_read', $m->kode_materi) }}"><button class="baca rounded"><img src="https://img.icons8.com/color/48/000000/reading-ebook.png" style="width:30px;"> Baca</button></a>
                            </p>
                        </div>
                    </div>

                @endforeach
            </div>
            
        </div>
    </div> 

</div>




@endsection

@section('scriptcss')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.1/cropper.min.css">
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('tooltip/css/animate.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('tooltip/css/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('tooltip/css/demo.css') }}">
<link rel="stylesheet" href="{{ asset('tooltip/css/tooltip-classic.css') }}"> --}}
<style>
.container-utama{
    height: auto;
}
.materi {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 14px;
}
.title{
    white-space: nowrap; 
  width: 100%; 
  overflow: hidden;
  text-overflow: ellipsis; 
}

.baca {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.baca:hover, a:hover {
  opacity: 0.7;
}

</style>
@endsection

@section('scriptjs')

<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
{{-- <script src="{{ asset('tooltip/js/anime.min.js') }}"></script>
<script src="{{ asset('tooltip/js/charming.min.js') }}"></script>
<script src="{{ asset('tooltip/js/main.js') }}"></script>
<script> --}}

    <script>
	

    </script>
@endsection