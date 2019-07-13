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
                                <th><sup>Jumlah</sup> Soal</th>
                                <th>Pelajaran</th>
                                <th>waktu</th>
                                <th><sup>Status</sup> Waktu</th>
                                <th><sup>Status</sup> Mengerjakan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($soal))
                                <tr>
                                    <td colspan="6" style="text-align:center;">Mentor belum membuat soal</td>
                                </tr>
                            @else
                            @for ($i = 0; $i < count($soal); $i++)
                            <tr style="text-align:center;" class="data-soal" data-id="{{ $soal[$i]['id'] }}">
                                <td style="width: 35%; text-align:left;">{{ $soal[$i]['judul'] }}</td>
                                <td>{{ $soal[$i]['jumlah_soal'] }}</td>
                                <td>{{ $soal[$i]['pelajaran']['nama_pelajaran'] }}</td>
                                <td>{{ $soal[$i]['tanggal_mulai'] }} - {{ $soal[$i]['tanggal_selesai'] }}</td>
                                <td>{{ $status_batas[$i]['status'] }}</td>
                                @if($status_batas[$i]['status'] == "lewat" && $status_mengerjakan[$i]['status'] == "belum")
                                    <td class="status">
                                        <span class="badge badge-danger">Tidak Mengerjakan</span>
                                    </td>
                                    
                                    <td class="status">
                                        <span class="badge badge-danger">Tidak Mengerjakan</span>
                                    </td>
                                @elseif($status_batas[$i]['status'] == "lewat" && $status_mengerjakan[$i]['status'] == "selesai")
                                    <td class="status">
                                        <span class="badge badge-success">Selesai</span>
                                    </td>
                                    
                                    <td class="status">
                                        <a class="btn btn-outline-info" href="{{ route('student.soal_nilai_cetak', $soal[$i]['id']) }}"> <i class="fas fa-print"></i> Cetak</a>
                                    </td>
                                @elseif($status_batas[$i]['status'] == "waktunya" && $status_mengerjakan[$i]['status'] == "belum")
                                    <td class="status">
                                        <span class="badge badge-warning">Waktunya</span>
                                    </td>
                                    <td class="status">
                                        <?php $id = Crypt::encrypt($soal[$i]['id']); ?>
                                        
                                        <form method="get" action="{{ route('student.soal_mengerjakan', [$id, $id_param = $id]) }}">
                                            <button class="btn btn-info text-white" >Kerjakan</button>
                                        </form>
                                    </td>
                                @elseif($status_batas[$i]['status'] == "waktunya" && $status_mengerjakan[$i]['status'] == "selesai")
                                    <td class="status">
                                        <span class="badge badge-success">Selesai</span>
                                    </td>
                                    <td class="status">
                                        <?php $id = Crypt::encrypt($soal[$i]['id']); ?>
                                        <a class="btn btn-outline-info" href="{{ route('student.soal_nilai_cetak', $soal[$i]['id']) }}"> <i class="fas fa-print"></i> Cetak</a>
                                    </td>
                                @endif
                            </tr>
                            @endfor
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    {{-- <td class="session">
            <span class="badge badge-success">Selesai</span>
        </td>
        <td class="session">
            <a class="btn btn-outline-info" href="{{ route('student.soal_nilai_cetak', $soal[$i]['id']) }}"> <i class="fas fa-print"></i> Cetak</a>
        </td> --}}

@endsection

@section('scriptcss')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
    .session{
        display: none;
    }
</style>
@endsection

@section('scriptjs')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function(){
        $("#tabel").DataTable();
    });
</script>

@if(Session::has("lewat"))
<script>
    Swal.fire(
        'Waktu Habis!',
        "Anda tidak menyelesaikan soal <strong>{{ Session::get('lewat') }}</strong> tepat waktu!",
        'error'
    )

    $(".data-soal td:nth-child(6)").hide();
    $(".data-soal td:nth-child(7)").hide();

    $(".data-soal").append("<td><span class='badge badge-danger'>Tidak selesai</span></td>" + "<td><span class='badge badge-danger'>Tidak selesai</span></td>");
</script>
@endif
@endsection
