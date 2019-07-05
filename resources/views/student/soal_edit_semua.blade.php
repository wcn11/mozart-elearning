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
                <h5 class="text-center">{{ $soal_judul->judul }}</h5>
            <a class="btn btn-danger float-right btn-selesai text-white">Selesai</a>

            <form class="form-hasil" action="{{ route('student.soal_nilai', $soal_judul->id) }}" method="post">
                @csrf
            </form>

            </div>
            <input type="hidden" name="soal_judul_id" value="{{ $soal_judul->id }}">
            <div class="card-body">

                @for($i = 0; $i < $soal_judul->jumlah_soal; $i++)
                
                    <?php $id = Crypt::encrypt($soal[$i]['id']); $nomor = $i+1; ?>
                    
                    {{ $nomor }}. {{ $soal[$i]['pertanyaan'] }} <br>
                    
                    <a class="btn btn-primary float-right mr-3" href="{{ route('student.soal_edit_persoal', [$id , $nomor]) }}">edit</a>

                    @if($hasil[$i]['jawaban'] == 1)
                        {{ $soal[$i]['pilihan1'] }} <br>
                    @elseif($hasil[$i]['jawaban'] == 2)
                        {{ $soal[$i]['pilihan2'] }} <br>
                    @elseif($hasil[$i]['jawaban'] == 3)
                        {{ $soal[$i]['pilihan3'] }} <br>
                    @elseif($hasil[$i]['jawaban'] == 4)
                        {{ $soal[$i]['pilihan4'] }} <br>
                    @elseif($hasil[$i]['jawaban'] == 5)
                        {{ $soal[$i]['pilihan5'] }} <br>
                    @else
                        Belum diisi
                    @endif
                    <div class="mt-3 invisible">kosong</div>
                    <hr>
                @endfor
            
            </div>
        </div>
    </div>
@endsection

@section('scriptcss')
@endsection

@section('scriptjs')
<script src={{ URL::to('js/sweetalert2/dist/sweetalert2.all.min.js') }}></script>
<script>
    $(document).ready(function(){

        $(".btn-selesai").click(function(){
            $(".form-hasil").submit();
        });

        // $(".btn-selesai").click(function(){

        // Swal.fire({
        //     title: 'Apakah anda yakin telah selesai?',
        //     text: "Kamu tidak akan bisa kembali lagi!",
        //     type: 'warning',
        //     showCancelButton: true,
        //     confirmButtonColor: '#3085d6',
        //     cancelButtonColor: '#d33',
        //     confirmButtonText: 'Ya, selesai!'
        //     }).then((result) => {
        //         if (result.value) {
        //             Swal.fire(
        //             'Tersimpan!',
        //             'Hasil kamu telah di simpan, segera lihat atau cetak.',
        //             'success'
        //             )
        //             alert("hasi");
        //         }
        //     })
        // });
    });
</script>
@endsection
