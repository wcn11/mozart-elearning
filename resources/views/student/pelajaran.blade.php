@extends('student.layouts.app')

@section('main-content')

<div class="container-fluid">

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
                          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                      </div>
            
        </div>
    </div>
    </div>



@endsection

@section('scriptcss')

<style>
</style>
@endsection

@section('scriptjs')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

@if ($pesan = Session::get('berhasil_mengikuti'))
<script>
    Swal.fire(
        'Berhasil!',
        'Anda berhasil mengikuti salah satu mentor!',
        'success'
    )

</script>
@endif
@endsection