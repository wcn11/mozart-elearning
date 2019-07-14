@extends('mentor.layouts.app')


@section('main-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <div class="col text-right mb-3 mt-3">

        <button class="btn btn-dark btn-modal-tambah-pelajaran"> <i class="fab fa-leanpub"></i> Tambah mata pelajaran</button>
    </div>
    {{-- data-target="#modal-pelajaran" data-toggle="modal" --}}
<!-- DataTales Example -->
<div class="card shadow mb-4 animated bounceInDown">
    <div class="card-header py-3 text-center">
        <h6 class="m-0 font-weight-bold text-primar bounce animated">Tabel pelajaran</h6>
    </div>
    <div class="card-body">

            <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach ($mapel as $mpl)
                            <a class="nav-item nav-link" id="nav-{{ $mpl->kode_mapel }}-tab" data-id="{{ $mpl->kode_mapel }}" data-toggle="tab" href="#nav-{{ $mpl->kode_mapel }}" role="tab" aria-controls="nav-{{ $mpl->kode_mapel }}"> {{ $mpl->nama_pelajaran }}</a>
                        @endforeach
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                        @foreach ($mapel as $mpl)
                            <div class="tab-pane fade" id="nav-{{ $mpl->kode_mapel }}" role="tabpanel" aria-labelledby="nav-{{ $mpl->kode_mapel }}-tab">
                                
                                <div class="container p-3 text-center">
                                    {{-- <a href="#" data-id="{{ $mpl->kode_mapel }}" class="btn btn-outline-danger btn-pdf"><i class="fas fa-print"></i> PDF</a>
                                    <a href="#" data-id="{{ $mpl->kode_mapel }}" class="btn btn-outline-success btn-excel"><i class="fas fa-file-excel"></i> EXCEL</a> --}}
                                    <button href="#" data-id="{{ $mpl->kode_mapel }}" data-nama="{{ $mpl->nama_pelajaran }}" class="btn btn-outline-danger btn-hapus-pelajaran animated bounceInUp"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    <button href="#" data-id="{{ $mpl->kode_mapel }}" data-nama="{{ $mpl->nama_pelajaran }}" class="btn btn-outline-secondary btn-edit-pelajaran animated bounceInUp"><i class="fas fa-edit"></i> Edit</button>
                                </div>
                                
                                <div class="table-responsive w-100 animated bounceInUp">
                                            <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr style="text-align:center;">
                                                        <th>Materi</th>
                                                        <th>Soal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td class="materi"></td>
                                                        <td class="soal"> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                            </div>
                        @endforeach
                  </div>

        
    </div>
</div>
</div>

<!-- Modal tambah pelajaran-->
<div class="modal fade animated swing" id="modal-pelajaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form form-tambah-mapel" action="{{ route('mentor.tambah_mapel') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="mapel">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" name="nama_pelajaran" id="mapel" aria-describedby="emailHelp" placeholder="Mata pelajaran">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary btn-tambah-pelajaran">Tambah</button>
            </div>
          </div>
        </div>
      </div>



<!-- Modal -->
<div class="modal fade animated swing" id="modal-edit-pelajaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Mata Pelajaran : <span class="edit_nama_mapel"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form form-update-mapel" action="{{ route('mentor.update_mapel') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="mapel">Nama Mata Pelajaran</label>
                    <input type="hidden" name="kode_mapel">
                    <input type="text" class="form-control" name="edit_nama_mapel" id="mapel" aria-describedby="emailHelp" placeholder="Mata pelajaran" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary btn-update-nama-mapel">Update</button>
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
    $(function(){

        $(".btn-update-nama-mapel").click(function(){
            $(".form-update-mapel").submit();
        });

        $(".btn-edit-pelajaran").click(function(){
            $(".edit_nama_mapel").text($(this).attr("data-nama"));
            $("[name='edit_nama_mapel']").val($(this).attr("data-nama"));
            $("[name='kode_mapel']").val($(this).attr("data-id"));
            $("#modal-edit-pelajaran").modal("show");
        });

        var kode_mapel = $("#nav-tab a:first-child").attr("data-id");
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "{{ url('/mentor/pelajaran/ambil_data') }}",
            data: {
                kode_mapel: kode_mapel
            },
            success: function(hasil){
                $(".materi").text(hasil.materi + " materi");
                $(".soal").text(hasil.soal + " soal");
            }
        });

        $(".btn-modal-tambah-pelajaran").click(function(){
            $("#modal-pelajaran").modal('show');
        });

        $("#nav-tab a:first-child").addClass("active");

        $(".tab-content .tab-pane:first-child").addClass('active show');

        $(".btn-tambah-pelajaran").click(function(){
            $(".form-tambah-mapel").submit();
        });

        $(".nav-item").click(function(){
            var kode_mapel = $(this).attr("data-id");
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ url('/mentor/pelajaran/ambil_data') }}",
                data: {
                    kode_mapel: kode_mapel
                },
                success: function(hasil){
                    $(".btn-pdf").attr("href", "{{ url('mentor/pelajaran/cetak') }}" + "/" + kode_mapel);

                    $(".materi").text(hasil.materi + " materi");
                    $(".soal").text(hasil.soal + " materi");
                }
            });
        });

        $(".btn-hapus-pelajaran").click(function(){
            var id = $(this).attr("data-id");

            Swal.fire({
                title: 'Apakah anda yakin ?',
                text: "Seluruh data yang terkait dengan pelajaran ini akan sepenuhnya dihapus!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d11',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal',
                animation: false,
                customClass: {
                    popup: 'animated shake'
                }
                }).then((result) => {
                    if (result.value) {

                        var id = $(this).attr("data-id");

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: "post",
                            url: "{{ url('mentor/pelajaran/hapus/') }}" + "/" + id,
                            success: function(hasil){
                                console.log(hasil);
                                location.reload();
                            }
                        });
                    }
                })
        });
    });
    
</script>

@if(Session::get('berhasil_tambah_mapel'))
<script>
    Swal.fire(
        'Berhasil!',
        "berhasil menambahkan mata pelajaran",
        'success'
    )

</script>
@endif

@if(Session::get('pelajaran_dihapus'))
<script>
    Swal.fire(
        'Berhasil!',
        "berhasil menghapus mata pelajaran",
        'success'
    )

</script>
@endif

@if(Session::has('berhasil_update_mapel'))
<script>
    Swal.fire(
        'Berhasil!',
        "berhasil mengupdate mata pelajaran",
        'success'
    )

</script>
@endif

@if(Session::has('pelajaran_kosong'))
<script>
    Swal.fire({
        title: "Tambah Mata Pelajaran",
        text: "Sebelum anda melanjutkan, anda diharuskan menambahkan minimal 1 mata pelajaran",
        type: "warning",
        showCancelButton: false,
        showConfirmButton: true,
        confirmButtonText: "Mengerti",
        animation: false,
        customClass: {
            popup: "animated bounce"
        }
    });
</script>
{{Session::forget("pelajaran_kosong")}}
@endif



@endsection