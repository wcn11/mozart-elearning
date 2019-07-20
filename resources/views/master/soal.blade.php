@extends('master.layouts.app')

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
            <div class="card-body container-utama overflow-auto" style="min-height:390px;">
                <div class="row ">

                    <div class="col-md-12">

                    <table id="tabel" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                    <tr style="text-align:center;">
                                        <th>Judul Soal</th>
                                        <th>Mentor</th>
                                        <th><sup>Jumlah</sup> Soal</th>
                                        <th>Pelajaran</th>
                                        <th>waktu</th>
                                        <th><sup>Status</sup> Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($soal as $s)
                                        <tr>
                                            <td>{{ $s->judul }}</td>
                                            <td>{{ $s->kjs_ke_mentor[0]['name'] }}</td>
                                            <td>{{ $s->jumlah_soal }}</td>
                                        <td>{{$s->pelajaran['nama_pelajaran']}}</td>
                                        <td>{{ $s->tanggal_mulai }} - {{ $s->tanggal_selesai }}</td>
                                        <td>status</td>
                                        <td>
                                                <a class="btn btn-success" href="{{route('master.lihat_soal', Crypt::encrypt($s->kode_judul_soal))}}"><i class="fas fa-eye"></i> Lihat</a>
                                                <button class="btn btn-danger btn-hapus" data-id="{{$s->kode_judul_soal}}"><i class="fas fa-trash-alt"></i> Hapus</button>
                                            <form action="{{route('master.delete_soal', $s->kode_judul_soal)}}" class="form-hapus-{{ $s->kode_judul_soal }}" method="post">
                                                    @csrf
                                                </form>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    
@endsection

@section('scriptcss')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
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

        $(".btn-hapus").click(function(){
            var kode = $(this).attr("data-id");

            Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "seluruh data mengenai soal ini akan di hapus sepenuhnya!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus!'
            }).then((result) => {
            if (result.value) {

                $(".form-hapus-"+kode).submit();
            }
            })
        });
    });
</script>


@if (Session::has("soal_terhapus"))
<script>
    Swal.fire(
                'Terhapus!',
                'Berhasil menghapus soal.',
                'success'
                )
</script>
@endif
@endsection
