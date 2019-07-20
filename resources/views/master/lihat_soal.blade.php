@extends('master.layouts.app')

@section('main-content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card">
                <div class="wrapper p-5">

                <h2 class="text-center">{{ $soal_judul->judul }}</h2>
                <h4 class="text-center">Jumlah soal : {{ $soal_judul->jumlah_soal }}</h4>
                <p class="text-center text-danger">{{ $soal_judul->tanggal_mulai }} - {{ $soal_judul->tanggal_selesai }} </p>
                <p class="text-capitalize text-center">{{ $soal_judul->kjs_ke_mentor[0]['name'] }}</p>
                    @for ($i = 0; $i < $soal_judul->jumlah_soal; $i++)
        
                    {{ $i +1 }}. {{ $soal[$i]['pertanyaan']}}
                    <br><br>
                        <div class="pilihan">
                            1 .{{ $soal[$i]['pilihan1']}}
                        </div> <br>
                        <div class="pilihan">

                            2. {{ $soal[$i]['pilihan2']}}<br>
                        </div> <br>
                        <div class="pilihan">

                            3. {{ $soal[$i]['pilihan3']}}<br>
                        </div> <br>
                        <div class="pilihan">

                            4. {{ $soal[$i]['pilihan4']}}<br>
                        </div> <br>
                        <div class="pilihan">

                            5. {{ $soal[$i]['pilihan5']}}<br>
                        </div> <br>
                        <div class="pilihan">

                            Pilihan benar : {{ $soal[$i]['pilihan_benar']}}<br><br>
                        </div>
                        <hr>
                    @endfor
                </div>
            </div>
        </div>       
    </div> 
@endsection

@section('scriptcss')
    <style>
    .pilihan{
        margin-left: 10px;
    }
    </style>
@endsection