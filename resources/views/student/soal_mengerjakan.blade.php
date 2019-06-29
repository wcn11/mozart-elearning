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
                <h6 class="m-0 font-weight-bold text-info text-center">{{ $soal_judul->judul }}</h6>
                <p class="text-center">{{ $soal->currentPage()}}/{{ $soal_judul->jumlah_soal }}</p>
            </div>
            <input type="hidden" name="soal_judul_id" value="{{ $soal_judul->id }}">
            <div class="card-body">
                @foreach($soal as $s)
                <input type="hidden" name="soal_id" value="{{ $s->id }}">
                {{ $soal->currentPage() }}. {{ $s->pertanyaan }}<br>
                    <div class="form-check form-soal" data-link="{{ route('student.soal_update', $s->id) }}">
                            <input class="form-check-input jawaban1" type="radio" name="jawaban" id="exampleRadios1" value="1">
                            <label class="form-check-label" for="exampleRadios1">
                              {{ $s->pilihan1 }}
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input jawaban2" type="radio" name="jawaban" id="exampleRadios2" value="2">
                            <label class="form-check-label" for="exampleRadios2">
                                    {{ $s->pilihan2 }}
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input jawaban3" type="radio" name="jawaban"  id="exampleRadios3" value="3">
                            <label class="form-check-label" for="exampleRadios3">
                                    {{ $s->pilihan3 }}
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input jawaban4" type="radio" name="jawaban" id="exampleRadios4" value="4">
                            <label class="form-check-label" for="exampleRadios4">
                              {{ $s->pilihan4 }}
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input jawaban5" type="radio" name="jawaban" id="exampleRadios5" value="5">
                            <label class="form-check-label" for="exampleRadios5">
                              {{ $s->pilihan5 }}
                            </label>
                          </div>
                @endforeach
                <input type="hidden" value="{{ $soal->total() }}" name="jumlah_soal">
            </div>
        </div>
    </div>
    @if($soal->currentPage() == $soal_judul->jumlah_soal)
    <div class="text-center">
        <?php $id = Crypt::encrypt($soal_judul->id); ?>
    <a class="btn btn-outline-info text-right btn-selesai" href="{{ route('student.soal_hasil',$id) }}">Selesai</a>
</div>
    @else
    <div class="text-center">
    <a class="btn btn-info text-right btn-selanjutnya" href="{{ $soal->nextPageUrl() }}">Selanjutnya</a>
</div>
    @endif
@endsection

@section('scriptcss')
@endsection

@section('scriptjs')
<script>
    $(document).ready(function(){
        // var jawaban = 0;
        $(".jawaban1").click(function(){
            jawaban = $(this).val();
            console.log(jawaban)
        });
        $(".jawaban2").click(function(){
            jawaban = $(this).val();
            console.log(jawaban)
        });
        $(".jawaban3").click(function(){
            jawaban = $(this).val();
            console.log(jawaban)
        });
        $(".jawaban4").click(function(){
            jawaban = $(this).val();
            console.log(jawaban)
        });
        $(".jawaban5").click(function(){
            jawaban = $(this).val();
            console.log(jawaban)
        });

        $(".btn-selanjutnya").click(function(event){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ url('/student/soal/update') }}",
                data: {
                    jawaban: jawaban,
                    soal_id: $("[name='soal_id']").val(),
                    soal_judul_id: $("[name='soal_judul_id']").val()
                },
                success: function(hasil){
                    console.log(hasil);
                    location.reload(true);
                }
            });
        });

        $(".btn-selesai").click(function(event){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ url('/student/soal/update') }}",
                data: {
                    jawaban: jawaban,
                    soal_id: $("[name='soal_id']").val(),
                    jumlah_soal: $("[name='jumlah_soal']").val(),
                    soal_judul_id: $("[name='soal_judul_id']").val()
                },
                success: function(hasil){
                    console.log(hasil);
                }
            });
        });

    });
</script>
@endsection
