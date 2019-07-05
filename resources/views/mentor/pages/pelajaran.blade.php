@extends('mentor.layouts.app')


@section('main-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span class="badge badge-danger">mengeluarkan</span> murid anda.</p>
    <div class="col text-right mb-3 mt-3">

        <button class="btn btn-dark btn-buat-soal"> Tambah mata pelajaran</button>
    </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Murid</h6>
    </div>
    <div class="card-body">
       hee
    </div>
</div>
</div>


{{--  MODAL  --}}

<div class="modal fade bd-example-modal-xl modal-hapus" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title"
                        style="font-size: 15px; text-align:center; font-weight:bold; text-transform:capitalize;"></h5>
                </div>
                <button type="button" class="close btn-tutup" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus soal ini ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-konfirmasi"
                    onclick="event.preventDefault();document.getElementById('form-hapus').submit();"
                    data-dismiss="modal">Hapus</button>
                <button type="button" class="btn btn-info btn-tutup" data-dismiss="modal">Tutup</button>
                <form id="form-hapus" action="#" method="post">
                    @csrf
                </form>
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
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function() {

        $('#tabel').DataTable();

        $(".form-buat-soal").hide();

        $("#jumlah_soal").keypress(function(e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#pesan_error").html("Hanya Angka!").show().fadeOut("slow");
                return false;
            }
        });

        $("#jumlah_waktu").keypress(function(e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#pesan_error_waktu").html("Hanya Angka!").show().fadeOut("slow");
                return false;
            }
        });

        $(".btn-buat-soal").click(function() {
            $(".form-buat-soal").toggle(1000);
            $(this).addClass("btn-buat-soal-tutup");
        });

        $(".btn-hapus").click(function(){
            $("#form-hapus").attr("action");
            var link = $(this).attr("data-link");
            console.log(link);
            $(".modal-hapus").modal();
            $("#form-hapus").attr("action", link)
        });

    });
</script>

@if(Session::get('hapus_soal'))
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah berhasil menghapus soal!',
        'success'
    )

</script>
@endif

@if(Session::get('buat_soal'))
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah berhasil menambahkan soal!',
        'success'
    )

</script>
@endif

@if(Session::get('update_soal'))
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah berhasil mengubah soal!',
        'success'
    )

</script>
@endif

@endsection