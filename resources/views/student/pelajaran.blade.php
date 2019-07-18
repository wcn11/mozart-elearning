@extends('student.layouts.app')

@section('main-content')

<div class="container-fluid">

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"></h1>
        <div class="col text-right mb-3 mt-3">
    
            {{-- <button class="btn btn-dark btn-modal-tambah-pelajaran"> <i class="fab fa-leanpub"></i> Tambah mata pelajaran</button> --}}
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
                        @for ($i = 0; $i < $jumlah; $i++)
                            <a class="nav-item nav-link nav-mentor" data-id="{{ $data[$i][0]['id_mentor'] }}" id="nav-{{ $data[$i][0]['id_mentor'] }}-tab" data-toggle="tab" href="#nav-{{ $data[$i][0]['id_mentor'] }}" role="tab" aria-controls="nav-{{ $data[$i][0]['id_mentor'] }}" aria-selected="true">{{ $data[$i][0]['name'] }}</a>
                        @endfor
                    </div>
                </nav>
                <div class="tab-content tab-content-mentor" id="nav-tabContent">
                    <div class='tab-pane fade p-2 m-2 active show mapel'>
                    </div>
                </div>
        </div>
    </div>
    </div>

@endsection

@section('scriptcss')

<style></style>
@endsection

@section('scriptjs')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "get",
            url: "{{ url('student/pelajaran/ambildata') }}",
            data:{
                id_mentor : $("#nav-tab a:first-child").attr("data-id")
            },
            success: function(hasil){

                $(".tab-content-mentor").text("");
                for(var i = 0; i < hasil.length; i++){
                    $(".tab-content-mentor").append(
                        "<div class='tab-pane fade p-2 m-2 active show' id='nav-" + hasil[i]['id_mentor'] + "' role='tabpanel'>" +
                            hasil[i]['nama_pelajaran'] +
                        "</div>"
                    );
                }
            }
        });

        $(".nav-mentor").click(function(){

            var id = $(this).attr("data-id");

            $.ajax({
                type: "get",
                url: "{{ url('student/pelajaran/ambildata') }}",
                data:{
                    id_mentor : id
                },
                success: function(hasil){
                    $(".tab-content-mentor").text("");
                    $(this).append(
                        "<a class='nav-item nav-link nav-mapel' id='nav-home-tab' data-toggle='tab'>Home</a>"
                    );
                    for(var i = 0; i < hasil.length; i++){

                        $(".tab-content-mentor").append(
                            hasil[i]['nama_pelajaran'] 
                        );
                    }
                }
            });
        });


        $("#nav-tab a:first-child").addClass("active");
        $(".nav-mapel:first-child").addClass("active");
        $(".tab-content .tab-pane:first-child").addClass('active show');
    })
    
</script>

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