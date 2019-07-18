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
                Soal akan berakhir pada : <span class="text-danger">{{ $soal_judul->tanggal_selesai }}</span>
            <button class="btn btn-danger float-right btn-selesai text-white">Selesai</button>
            <?php $id_url = Crypt::encrypt($soal_judul->kode_judul_soal); $id_param = $id_url;?>
            <form class="form-hasil" action="{{ route('student.soal_nilai', [$id_url, $id_param]) }}" method="post">
                @csrf
                <input type="hidden" name="id_url" value="{{ $id_url }}">
            </form>

            </div>
            <input type="hidden" name="soal_judul_id" value="{{ $soal_judul->kode_judul_soal }}">
            <div class="card-body">

                @for($i = 0; $i < $soal_judul->jumlah_soal; $i++)
                
                    <?php $id = Crypt::encrypt($soal[$i]['kode_soal']); $nomor = $i+1; ?>
                    
                    {{ $nomor }}. {{ $soal[$i]['pertanyaan'] }} <br>
                    
                    <a class="btn btn-primary float-right mr-3" href="{{ route('student.soal_edit_persoal', [$id , $nomor, $id_param = Crypt::encrypt($soal_judul->kode_judul_soal)]) }}">edit</a>

                    @if($hasil[$i]['jawaban'] == 1)
                        A. {{ $soal[$i]['pilihan1'] }} <br>
                    @elseif($hasil[$i]['jawaban'] == 2)
                        B. {{ $soal[$i]['pilihan2'] }} <br>
                    @elseif($hasil[$i]['jawaban'] == 3)
                        C. {{ $soal[$i]['pilihan3'] }} <br>
                    @elseif($hasil[$i]['jawaban'] == 4)
                        D. {{ $soal[$i]['pilihan4'] }} <br>
                    @elseif($hasil[$i]['jawaban'] == 5)
                        E. {{ $soal[$i]['pilihan5'] }} <br>
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
            

            Swal.fire({
                title: 'Apakah anda yakin telah selesai?',
                text: "Anda tidak akan bisa kembali lagi!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Selesai'
                }).then((result) => {
                if (result.value) {

                    $(".form-hasil").submit();

                    Swal.fire({
                        title: 'Berhasil',
                        text: "Jawaban telah dihitung!",
                        type: 'success',
                        showCancelButton: false,
                        showConfirmButton: false
                    })

                }
                })
        });

    });
</script>

@endsection

@section('scriptcss')
@endsection