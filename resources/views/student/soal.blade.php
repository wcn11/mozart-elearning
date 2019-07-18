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
                <h6 class="m-0 font-weight-bold text-info text-center">Pilih mentor untuk melihat daftar soal</h6>
            </div>
            <div class="card-body container-utama overflow-auto" style="min-height:390px;">
                <div class="row ">

                    

                        @foreach ($mentor->mentor as $m)

                        <div class="col-md-3">
                            <?php $id = Crypt::encrypt($m->id_mentor) ?>
                                <a href="{{ route('student.soal_permentor', $id_mentor = $id, $id_param = $id) }}"><div class="flip-card p-2 m-2" data-toggle="tooltip" data-placement="top" title="{{ $m->name }}">
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
                            </div>
        
                        @endforeach
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

.container-utama{
    height: auto;
}
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
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function(){
        $("#tabel").DataTable();
    });
</script>

{{-- @for($j = 0; $j < count($soal); $j++)

    @if(Session::has("lewat".$j))
    <script>
        var session = "{{ Session::get('lewat') }}";
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

@endfor --}}
@endsection
