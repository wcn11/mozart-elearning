@extends('student.layouts.app')

@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mentor yang anda ikuti</h1>
    {{--  <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
            class="badge badge-danger">mengeluarkan</span> murid anda.</p>  --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pilih mentor untuk melihat daftar materi</h6>
        </div>
        <div class="card-body container-utama overflow-auto" style="min-height:390px;">
            <div class="row ">
                @foreach ($std as $m)

                <a href="{{ route('student.daftar_materi', $m->id_mentor) }}"><div class="flip-card p-2 m-2" data-toggle="tooltip" data-placement="top" title="{{ $m->name }}">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img class="rounded" src="{{ url('/images/'.$m->foto) }}" alt="{{ $m->name }}" style="width:100%;height:100%;">
                                
                                <div class="nama bg-white rounded" style="width:88%;">
                                    <p class="text-dark text-capitalize text-left m-2">{{ $m->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                    {{-- <div class="col-md-3">
                        <div class="card materi rounded">
                            <a class="kemateri" href="{{ route('student.soal_permentor', $s->id_mentor) }} ">
                                <img src="{{ url('/images/'.$s->foto) }}" class="profil" alt="{{ $s->name }}" style="width:100%">
                                <p class="title p-2" data-toggle="tooltip" data-placement="top" title="{{ $s->name }}">{{ $s->name }}</p>
                            </a>
                            <p></p>
                        </div>
                    </div> --}}

                @endforeach
            </div>
        </div>

    </div>
</div>




@endsection

@section('scriptcss')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.1/cropper.min.css">
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>

    .nama {
        position: absolute;
        bottom: 8px;
        left: 16px;
    }
    .badge-keterangan{
        position: absolute;
        bottom: 25%;
    }
    
    .flip-card {
        background-color: transparent;
        width: 300px;
        height: 300px;
        perspective: 1000px;
    }
    
    .flip-card-inner {
        position: relative;
        width: 90%;
        height: 90%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }
    
    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
    }
    
    .flip-card-front {
        background-color: #bbb;
        color: black;
    }
    
    .flip-card-back {
        background-color: #2980b9;
        color: white;
        transform: rotateY(180deg);
    }
</style>
@endsection

@section('scriptjs')

<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
$(document).ready(function() {
    $('#tabel').DataTable();
} );
</script>
@endsection