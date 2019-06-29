@extends('student.layouts.app')

@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Mentor</h1>
    <p class="mb-4">Pilih mentor utuk dapat mulai belajar</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mentor</h6>
        </div>
        <div class="card-body">
                <div class="row">
                        <div class="row">
                            @foreach($mentor as $m)
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="#">
                                    <img class="img-thumbnail"
                                        src="{{ url('/images/'.$m->foto) }}"
                                        alt="{{ $m->name }}">
                                </a>
                                <p class="text-center font-weight-bolder" style="color:inherit;">{{ $m->name }}</p>
                                <a href="{{ route('student.ikuti', $m->id) }}"><button class="btn btn-info text-center w-100">Ikuti</button></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
        </div>
    </div>
</div>




@endsection