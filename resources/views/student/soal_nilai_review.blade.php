@extends('student.layouts.app')

@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Review jawaban</h1>
        {{--  <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
                class="badge badge-danger">mengeluarkan</span> murid anda.</p>  --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="text-center">{{ $soal_judul->judul }}</h5>
                <p class="text-dark float-left"><i class="fas fa-check"></i> Benar       : {{ $nilai[0]['nilai'] }}</p><span class="clearfix"></span>
                <p class="text-dark float-left"><i class="fas fa-times-circle"></i> Salah : {{ $soal_judul->jumlah_soal - $nilai[0]['nilai'] }}</p><span class="clearfix"></span>
                <p class="text-dark float-left"><i class="fas fa-calendar-check"></i> Jumlah Soal : {{ $soal_judul->jumlah_soal }}</p>
                <br>
                <div class="row justify-content-end">
                    
                    <a class="btn btn-info btn-md btn-selesai text-white m-2" href="{{ route('student.soal_nilai_cetak', $soal_judul->kode_judul_soal) }}"><i class="fas fa-print"></i> Cetak</a>

                    <a class="btn btn-secondary text-white m-2" href="{{ route('student.soal') }}"><i class="fas fa-stream"></i> Kembali</a>
                </div>

            </div>
            <?php $id = Crypt::encrypt($soal_judul->kode_judul_soal) ?>
            <input type="hidden" name="soal_judul_id" value="{{$id}}">
            <div class="card-body">

                @for($i = 0; $i < $soal_judul->jumlah_soal; $i++)
                
                    <?php $id = Crypt::encrypt($soal[$i]['id']); $nomor = $i+1; ?>
                    
                    {{ $nomor }}. {{ $soal[$i]['pertanyaan'] }} <br>

                    @if($jumlah_jawaban <= $i)
                        <div class="p-2">Belum memilih</div>
                    @else
                        @if($soal[$i]['pilihan_benar'] == 1)
                            @if ($hasil[$i]['jawaban'] == 1)
                                <div class="border-bottom-success p-2"> A. {{ $soal[$i]['pilihan1'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 2)
                                <div class="border-bottom-success p-2"> A. {{ $soal[$i]['pilihan1'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="border-bottom-danger p-2">B. {{ $soal[$i]['pilihan2'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 3)
                                <div class="border-bottom-success p-2"> A. {{ $soal[$i]['pilihan1'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="border-bottom-danger p-2">C. {{ $soal[$i]['pilihan3'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 4)
                                <div class="border-bottom-success p-2"> A. {{ $soal[$i]['pilihan1'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="border-bottom-danger p-2">D. {{ $soal[$i]['pilihan4'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 5)
                                <div class="border-bottom-success p-2"> A. {{ $soal[$i]['pilihan1'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="border-bottom-danger p-2">E. {{ $soal[$i]['pilihan5'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                            @else
                                Belum memilih
                            @endif

                        @elseif($soal[$i]['pilihan_benar'] == 2)
                            @if ($hasil[$i]['jawaban'] == 1)
                                <div class="border-bottom-danger p-2"> A. {{ $soal[$i]['pilihan1'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="border-bottom-success p-2">B. {{ $soal[$i]['pilihan2'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 2)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="border-bottom-success p-2">B. {{ $soal[$i]['pilihan2'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 3)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="border-bottom-success p-2">B. {{ $soal[$i]['pilihan2'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="border-bottom-danger p-2">C. {{ $soal[$i]['pilihan3'] }}<span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 4)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="border-bottom-success p-2">B. {{ $soal[$i]['pilihan2'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="border-bottom-danger p-2">D. {{ $soal[$i]['pilihan4'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 5)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="border-bottom-success p-2">B. {{ $soal[$i]['pilihan2'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="border-bottom-danger p-2">E. {{ $soal[$i]['pilihan5'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                            @else
                                Belum memilih
                            @endif

                        @elseif($soal[$i]['pilihan_benar'] == 3)
                            @if ($hasil[$i]['jawaban'] == 1)
                                <div class="border-bottom-danger p-2"> A. {{ $soal[$i]['pilihan1'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="border-bottom-success p-2">C. {{ $soal[$i]['pilihan3'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 2)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="border-bottom-danger p-2">B. {{ $soal[$i]['pilihan2'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="border-bottom-success p-2">C. {{ $soal[$i]['pilihan3'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 3)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="border-bottom-success p-2">C. {{ $soal[$i]['pilihan3'] }}<span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 4)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="border-bottom-success p-2">C. {{ $soal[$i]['pilihan3'] }}<span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="border-bottom-danger p-2">D. {{ $soal[$i]['pilihan4'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 5)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="border-bottom-success p-2">C. {{ $soal[$i]['pilihan3'] }}<span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="border-bottom-danger p-2">E. {{ $soal[$i]['pilihan5'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                            @else
                                Belum memilih
                            @endif

                        @elseif($soal[$i]['pilihan_benar'] == 4)
                            @if ($hasil[$i]['jawaban'] == 1)
                                <div class="border-bottom-danger p-2"> A. {{ $soal[$i]['pilihan1'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="border-bottom-success p-2">D. {{ $soal[$i]['pilihan4'] }}<span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 2)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="border-bottom-danger p-2">B. {{ $soal[$i]['pilihan2'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="border-bottom-success p-2">D. {{ $soal[$i]['pilihan4'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 3)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="border-bottom-danger p-2">C. {{ $soal[$i]['pilihan3'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="border-bottom-success p-2">D. {{ $soal[$i]['pilihan4'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 4)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="border-bottom-success p-2">D. {{ $soal[$i]['pilihan4'] }} <span class="float-right badge badge-success"><i class="fas fa-times-circle"></i> Jawaban benar</span></div>
                                <div class="p-2">E. {{ $soal[$i]['pilihan5'] }}</div>
                            @elseif($hasil[$i]['jawaban'] == 5)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="border-bottom-success p-2">D. {{ $soal[$i]['pilihan4'] }}<span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                                <div class="border-bottom-danger p-2">E. {{ $soal[$i]['pilihan5'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                            @else
                                Belum memilih
                            @endif

                            @elseif($soal[$i]['pilihan_benar'] == 5)
                            @if ($hasil[$i]['jawaban'] == 1)
                                <div class="border-bottom-danger p-2"> A. {{ $soal[$i]['pilihan1'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="border-bottom-success p-2">E. {{ $soal[$i]['pilihan5'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                            @elseif($hasil[$i]['jawaban'] == 2)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="border-bottom-danger p-2">B. {{ $soal[$i]['pilihan2'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="border-bottom-success p-2">E. {{ $soal[$i]['pilihan5'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                            @elseif($hasil[$i]['jawaban'] == 3)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="border-bottom-danger p-2">C. {{ $soal[$i]['pilihan3'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }} </div>
                                <div class="border-bottom-success p-2">E. {{ $soal[$i]['pilihan5'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                            @elseif($hasil[$i]['jawaban'] == 4)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="border-bottom-danger p-2">D. {{ $soal[$i]['pilihan4'] }} <span class="float-right badge badge-danger"><i class="fas fa-times-circle"></i> Jawaban kamu</span></div>
                                <div class="border-bottom-success p-2">E. {{ $soal[$i]['pilihan5'] }} <span class="float-right badge badge-success"><i class="fas fa-times-circle"></i> Jawaban benar</span></div>
                            @elseif($hasil[$i]['jawaban'] == 5)
                                <div class="p-2"> A. {{ $soal[$i]['pilihan1'] }}</div>
                                <div class="p-2">B. {{ $soal[$i]['pilihan2'] }}</div>
                                <div class="p-2">C. {{ $soal[$i]['pilihan3'] }}</div>
                                <div class="p-2">D. {{ $soal[$i]['pilihan4'] }}</div>
                                <div class="border-bottom-success p-2">E. {{ $soal[$i]['pilihan5'] }} <span class="float-right badge badge-success"><i class="fas fa-check"></i> Jawaban benar</span></div>
                            @else
                                Belum memilih
                            @endif
                        @else
                            Belum diisi
                        @endif
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
