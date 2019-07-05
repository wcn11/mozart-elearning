@extends('student.layouts.app')

@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        {{--  <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
                class="badge badge-danger">mengeluarkan</span> murid anda.</p>  --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                    <p class="h3 mb-2 text-gray-1000 badge badge-pill badge-primary float-right">{{ $materi->pelajaran->nama_pelajaran }}</p>
                <h5 class="m-0 font-weight-bold text-primary text-center">{{ $materi->judul_materi }}</h5>
            </div>
            <div class="card-body">
                {!! $materi->materi !!}
            </div>
        </div>
    </div>

@endsection
