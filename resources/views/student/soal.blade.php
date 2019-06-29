@extends('student.layouts.app')

@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar soal</h1>
        {{--  <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
                class="badge badge-danger">mengeluarkan</span> murid anda.</p>  --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info text-center"></h6>
            </div>
            <div class="card-body">
                    <div class="table-responsive w-100">
                            <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Judul Soal</th>
                                        <th>Jumlah Soal</th>
                                        <th>Pelajaran</th>
                                        <th>waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(empty($soal))
                                    <tr>
                                        <td colspan="6" style="text-align:center;">Mentor belum membuat soal</td>
                                    </tr>
                                    @else
                                    @foreach ($soal as $s)
                                    <tr style="text-align:center;">
                                        <td style="width: 35%; text-align:left;">{{ $s->judul }}</td>
                                        <td>{{ $s->jumlah_soal }}</td>
                                        <td>{{ $s->pelajaran->nama_pelajaran }}</td>

                                        <td>{{ $s->waktu_pengerjaan }}</td>
                                        <td>
                                            <?php $id = Crypt::encrypt($s->id); ?>
                                            <a class="btn btn-info text-white">Kerjakan</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                        </div>
            </div>
        </div>
    </div>

@endsection

@section('scriptcss')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('scriptjs')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script>
    $(document).ready(function(){
        $("#tabel").DataTable();
    });

</script>
@endsection
