@extends('student.layouts.app')

@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Materi</h1>
    {{--  <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
            class="badge badge-danger">mengeluarkan</span> murid anda.</p>  --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Murid</h6>
        </div>
        <div class="card-body">
                <div class="row">
                        <div class="row p-2">
                                @foreach ($materi as $m)
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb p-2">
                                    <img class="img-thumbnail"
                                    src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                    alt="Another alt text">
                                    <div class="card">
                                    <p class="p-2">{{ $m->judul_materi }}</p>
                                </div>
                                    <a href="{{ route('student.materi_read', $m->id) }}"><button class="btn btn-info w-100">Baca</button></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
        </div>
    </div>
</div>




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