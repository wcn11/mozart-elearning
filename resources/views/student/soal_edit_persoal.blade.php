@extends('student.layouts.app')

@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar soal</h1>
        {{--  <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
                class="badge badge-danger">mengeluarkan</span> murid anda.</p>  --}}

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info text-center">{{ $soal_judul->judul }}</h6>
                Soal akan berakhir pada : <span class="text-danger">{{ $soal_judul->tanggal_selesai }}</span>
            </div>
            <input type="hidden" name="kode_judul_soal" value="{{ $soal_judul->kode_judul_soal }}">
            <div class="card-body">
                <input type="hidden" name="kode_soal" value="{{ $soal->kode_soal }}">
                {{ $nomor }}. {{ $soal->pertanyaan }}<br>
                    <div class="form-check form-soal" data-link="{{ route('student.soal_update', $soal->kode_soal) }}">
                        @if ($hasil[0]['jawaban'] == 1)
                            <input class="form-check-input jawaban1 jawaban" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban" checked id="exampleRadios1" value="1">
                        @else
                            <input class="form-check-input jawaban1 jawaban" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban" id="exampleRadios1" value="1">
                        @endif
                        <label class="form-check-label" for="exampleRadios1">
                            {{ $soal->pilihan1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if ($hasil[0]['jawaban'] == 2)
                            <input class="form-check-input jawaban2" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban" checked id="exampleRadios2" value="2">
                        @else
                            <input class="form-check-input jawaban2" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban" id="exampleRadios2" value="2">
                        @endif
                        <label class="form-check-label" for="exampleRadios2">
                                {{ $soal->pilihan2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if ($hasil[0]['jawaban'] == 3)
                            <input class="form-check-input jawaban3" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban" checked id="exampleRadios3" value="3">
                        @else
                            <input class="form-check-input jawaban3" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban"  id="exampleRadios3" value="3">
                        @endif
                        <label class="form-check-label" for="exampleRadios3">
                                {{ $soal->pilihan3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if ($hasil[0]['jawaban'] == 4)
                            <input class="form-check-input jawaban4" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban" checked id="exampleRadios4" value="4">
                        @else
                            <input class="form-check-input jawaban4" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban" id="exampleRadios4" value="4">
                        @endif
                        <label class="form-check-label" for="exampleRadios4">
                            {{ $soal->pilihan4 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if ($hasil[0]['jawaban'] == 5)
                            <input class="form-check-input jawaban5" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban" checked id="exampleRadios5" value="5">
                        @else
                            <input class="form-check-input jawaban5" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban" id="exampleRadios5" value="5">
                        @endif
                        <label class="form-check-label" for="exampleRadios5">
                            {{ $soal->pilihan5 }}
                        </label>
                    </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <?php $id = Crypt::encrypt($soal_judul->kode_judul_soal); ?>
        <a class="btn btn-outline-info text-right btn-selesai" href="{{ route('student.soal_edit', [$id, $id_param = $id]) }}">Update</a>
    </div>
@endsection

@section('scriptcss')
@endsection

@section('scriptjs')
<script>
    $(document).ready(function(){
        
        $(".jawaban1").click(function(){
            jawaban1 = $(this).val();
            var param = $(this).attr("data-param");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ url('/student/soal/update') }}" + "/" + param,
                data: {
                    jawaban: jawaban1,
                    kode_soal: $("[name='kode_soal']").val(),
                    kode_judul_soal: $("[name='kode_judul_soal']").val()
                },
                success: function(hasil1){
                    if(hasil1.telah_lewat == "lewat"){
                        window.location = "{{ route('student.soal') }}";
                    }else if(hasil1.telah_selesai == "selesai"){
                        window.location = "{{ route('student.soal') }}";
                    }
                }
            });

            console.log(jawaban1)
        });
        $(".jawaban2").click(function(){
            jawaban2 = $(this).val();
            var param = $(this).attr("data-param");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ url('/student/soal/update') }}" + "/" + param,
                data: {
                    jawaban: jawaban2,
                    kode_soal: $("[name='kode_soal']").val(),
                    kode_judul_soal: $("[name='kode_judul_soal']").val()
                },
                success: function(hasil2){
                    if(hasil2.telah_lewat == "lewat"){
                        window.location = "{{ route('student.soal') }}";
                    }else if(hasil2.telah_selesai == "selesai"){
                        window.location = "{{ route('student.soal') }}";
                    }
                }
            });
            console.log(jawaban2)
        });
        $(".jawaban3").click(function(){
            jawaban3 = $(this).val();
            var param = $(this).attr("data-param");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ url('/student/soal/update') }}" + "/" + param,
                data: {
                    jawaban: jawaban3,
                    kode_soal: $("[name='kode_soal']").val(),
                    kode_judul_soal: $("[name='kode_judul_soal']").val()
                },
                success: function(hasil3){
                    if(hasil3.telah_lewat == "lewat"){
                        window.location = "{{ route('student.soal') }}";
                    }else if(hasil3.telah_selesai == "selesai"){
                        window.location = "{{ route('student.soal') }}";
                    }
                }
            });
        });
        $(".jawaban4").click(function(){
            jawaban4 = $(this).val();
            var param = $(this).attr("data-param");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ url('/student/soal/update') }}" + "/" + param,
                data: {
                    jawaban: jawaban4,
                    kode_soal: $("[name='kode_soal']").val(),
                    kode_judul_soal: $("[name='kode_judul_soal']").val()
                },
                success: function(hasil4){
                    if(hasil4.telah_lewat == "lewat"){
                        window.location = "{{ route('student.soal') }}";
                    }else if(hasil4.telah_selesai == "selesai"){
                        window.location = "{{ route('student.soal') }}";
                    }
                }
            });
        });
        $(".jawaban5").click(function(){
            jawaban5 = $(this).val();
            var param = $(this).attr("data-param");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ url('/student/soal/update') }}" + "/" + param,
                data: {
                    jawaban: jawaban5,
                    kode_soal: $("[name='kode_soal']").val(),
                    kode_judul_soal: $("[name='kode_judul_soal']").val()
                },
                success: function(hasil5){
                    console.log(hasil5);
                    if(hasil5.telah_lewat == "lewat"){
                        window.location = "{{ route('student.soal') }}";
                    }else if(hasil5.telah_selesai == "selesai"){
                        window.location = "{{ route('student.soal') }}";
                    }
                }
            });
        });

    });


</script>
@endsection
