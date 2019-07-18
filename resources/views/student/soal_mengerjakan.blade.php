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
                Soal akan berakhir pada : <span class="text-danger">{{ $soal_judul->tanggal_selesai }}</span>
            </div>
            <input type="hidden" name="kode_judul_soal" value="{{ $soal_judul->kode_judul_soal }}">
            <div class="card-body">
                @foreach($soal as $s)
                <input type="hidden" name="kode_soal" value="{{ $s->kode_soal }}">
                {{ $soal->currentPage() }}. {{ $s->pertanyaan }} <br>
                    <div class="form-check form-soal" data-link="{{ route('student.soal_update', $s->kode_judul_soal) }}">
                        <input class="form-check-input jawaban1" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban" id="exampleRadios1" value="1">
                            <label class="form-check-label" for="exampleRadios1">
                                {{ $s->pilihan1 }}
                            </label>
                        </div>
                          <div class="form-check">
                            <input class="form-check-input jawaban2" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban" id="exampleRadios2" value="2">
                            <label class="form-check-label" for="exampleRadios2">
                                    {{ $s->pilihan2 }}
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input jawaban3" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban"  id="exampleRadios3" value="3">
                            <label class="form-check-label" for="exampleRadios3">
                                    {{ $s->pilihan3 }}
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input jawaban4" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban" id="exampleRadios4" value="4">
                            <label class="form-check-label" for="exampleRadios4">
                              {{ $s->pilihan4 }}
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input jawaban5" data-param="{{ Crypt::encrypt($soal_judul->kode_judul_soal) }}" type="radio" name="jawaban" id="exampleRadios5" value="5">
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
        <?php $id = Crypt::encrypt($soal_judul->kode_judul_soal); ?>
    <a class="btn btn-outline-info text-right btn-selesai" data-link={{ route('student.soal_edit',[$id, $id_param = $id ]) }} href="javascript::void(0)">Selesai</a>
</div>
    @else
    <div class="text-center">
    <a class="btn btn-info text-right text-white btn-selanjutnya" data-link="{{ $soal->nextPageUrl() }}">Selanjutnya</a>
</div>
    @endif
@endsection

@section('scriptcss')
<style>
.btn-selanjutnya:hover{
    cursor: pointer;
}
</style>

@endsection

@section('scriptjs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function(){

        $(".belum-memilih").hide();

        
        $(".jawaban1").click(function(){
            jawaban1 = $(this).val();
            $(".belum-memilih").hide();
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
                    kode_judul_soal: $("[name='kode_judul_soal']").val(),
                    
                },
                success: function(hasil1){
                    
                    if(hasil1.telah_lewat == "lewat"){
                        window.location = "{{ route('student.soal') }}";
                    }else if(hasil1.telah_selesai == "selesai"){
                        window.location = "{{ route('student.soal') }}";
                    }
                },
                errors: function(hasil){
                    console.log(hasil.errors);
                }
            });
        });
        $(".jawaban2").click(function(){
            jawaban2 = $(this).val();
            $(".belum-memilih").hide();
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
                    kode_judul_soal: $("[name='kode_judul_soal']").val(),
                    
                },
                success: function(hasil2){
                    if(hasil2.telah_lewat == "lewat"){
                        window.location = "{{ route('student.soal') }}";
                    }else if(hasil2.telah_selesai == "selesai"){
                        window.location = "{{ route('student.soal') }}";
                    }
                }
            });
        });
        $(".jawaban3").click(function(){
            jawaban3 = $(this).val();
            $(".belum-memilih").hide();
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
                    kode_judul_soal: $("[name='kode_judul_soal']").val(),
                    
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
            $(".belum-memilih").hide();
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
                    kode_judul_soal: $("[name='kode_judul_soal']").val(),
                    
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
            $(".belum-memilih").hide();

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
                    kode_judul_soal: $("[name='kode_judul_soal']").val(),
                    
                },
                success: function(hasil5){
                    if(hasil5.telah_lewat == "lewat"){
                        window.location = "{{ route('student.soal') }}";
                    }else if(hasil5.telah_selesai == "selesai"){
                        window.location = "{{ route('student.soal') }}";
                    }
                }
            });
        });

        $(".btn-selanjutnya").click(function(event){

            if($("[name='jawaban']").is(":checked")){
                var link = $(this).attr('data-link');
                $(this).attr("href", link);
            }else{
                Swal.fire({
                    title: 'Harus Memilih!',
                    text: 'Anda harus memilih salah satu jawaban!',
                    type: 'warning',
                    confirmButtonText: "Mengerti",
                    animation: false,
                    customClass: {
                        popup: 'animated shake'
                    }
                });
            }
        });

        $(".btn-selesai").click(function(event){

            if($("[name='jawaban']").is(":checked")){
                var link = $(this).attr('data-link');
                $(this).attr("href", link);
            }else{
                Swal.fire({
                    title: 'Harus Memilih!',
                    text: 'Anda harus memilih salah satu jawaban!',
                    type: 'warning',
                    confirmButtonText: "Mengerti",
                    animation: false,
                    customClass: {
                        popup: 'animated shake'
                    }
                });
            }
        });

    });
</script>

@if(Session::get('jawaban'))
<script>
    var jawaban = {{ Session::get('jawaban') }};
    $(".jawaban" + jawaban).attr("checked", "checked");
</script>
@endif

{{-- @if(Session::has('belum'))
<script>
    location.reload(true);
</script>
@endif --}}

@endsection
