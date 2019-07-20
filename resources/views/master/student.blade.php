@extends('master.layouts.app')

@section('main-content')
    
    <div class="container">
        <div class="row">

                <div class="col-md-12 m-2">

                        <div class="card w-100 text-white border-0" style="">
                            <div class="card-body" style="background-color:#53d3e8;border-radius:10px;">
                    
                                <div class="input-group-prepend w-100 mb-2">
                                    <span class="input-group-text bg-dark text-white label-card">
                                                        <img src="https://img.icons8.com/color/48/000000/student-male.png" class="icon-colored"> Student</span>
                                </div><br>
                                <table id="tabel" class="table table-striped table-bordered table-hover table-borderless" style="width:100%">
                                    <thead class="text-white">
                                        <tr style="background-color:#0a336b;" class="text-center">
                                            <th>Profil</th>
                                            <th>ID Student</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Mapel</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Mentor</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                        @foreach($student as $s)
                                        <tr>
                                            <td class="w-25"><img src="{{ url("images/".$s->foto) }}" class="profil rounded"></td>
                                            <td>{{ $s->id_student }}</td>
                                            <td>{{ $s->name }}</td>
                                            <td>{{ $s->email }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($s->mentor as $m1)
                                                        {{-- {{ $p->pelajaran }} --}}
                                                        @foreach ($m1->pelajaran as $p)
                                                            <li>{{ $p->nama_pelajaran }}</li>
                                                        @endforeach
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ $s->tanggal_daftar }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($s->mentor as $m)
                                                        <li>{{ $m->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <button data-id="{{ $s->id_student }}" class="btn btn-danger btn-hapus">
                                                    <i class="fas fa-trash-alt"></i> hapus</a>
                                                </button>
                                                <form action="{{ route('master.delete_student', $s->id_student) }}" class="form-{{ $s->id_student }}" method="post">
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                    
                    </div>

        </div>
    </div>
@endsection

@section('scriptcss')
    <style>
    .label-card {
	border-radius: 10px;
	border: 0px;
}
.profil{
    width: 100%;
}
    </style>
@endsection

@section('scriptjs')
    <script>
        $(document).ready( function () {
            $('#tabel').DataTable();
            $('#tabel_std').DataTable();
        } );
        
        $(".btn-hapus").click(function(){
            var id = $(this).attr("data-id");
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Seluruh data berdasarkan student ini akan terhapus sepenuhnya!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
                }).then((result) => {
                    if (result.value) {
                        $(".form-" + id).submit();

                        Swal.fire(
                        'Terhapus!',
                        'Berhasil menghapus student.',
                        'success'
                        )
                    }
                })
        });
    </script>

    {{-- @if (Session::has("mentor_terhapus"))
        <script>
            Swal.fire(
                        'Terhapus!',
                        'Berhasil menghapus mentor.',
                        'success'
                        )
        </script>
    @endif --}}
@endsection