@extends('master.layouts.app')

@section('main-content')

    <div class="container">
        <div class="row">

             <!-- Earnings (Monthly) Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mentor</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $mentor->count() }}</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                            <img src="https://img.icons8.com/color/48/000000/school-director.png">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              

                  <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <h3 class="text-xs font-weight-bold text-warning text-uppercase mb-1">Student</h3>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $student->count() }}</div>
                          </div>
                          <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/student-male.png">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  


                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Soal</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $soal }}</div>
                                </div>
                                <div class="col-auto">
                                        <img src="https://img.icons8.com/color/48/000000/questions.png">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Materi</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $materi }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="https://img.icons8.com/color/48/000000/test-passed.png">
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                    <div class="col-md-12 m-2">
                        
                            <div class="card w-100 text-white border-0" style="">
                                    <div class="card-body"  style="background-color:#53d3e8;border-radius:10px;">

                                            <div class="input-group-prepend w-100 mb-2">
                                                    <span class="input-group-text bg-dark text-white label-card">
                                                            <img src="https://img.icons8.com/color/48/000000/school-director.png" class="icon-colored"> Mentor</span>
                                                </div><br>
                                        <table id="tabel" class="table table-striped table-bordered table-hover table-borderless" style="width:100%">
                                                <thead class="text-white">
                                                    <tr style="background-color:#0a336b;" class="text-center">
                                                        <th>Profil</th>
                                                        <th>Judul soal</th>
                                                        <th>Pelajaran</th>
                                                        <th>Mentor</th>
                                                        <th>Status</th>
                                                        <th>Status Mengerjakan</th>
                                                        <th>Hasil</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-white">
                                                    @foreach($mentor as $m)
                                                    <tr>
                                                        <td class="w-25"><img src="{{ url("images/".$m->foto) }}" class="profil rounded"></td>
                                                        <td>{{ $m->id_mentor }}</td>
                                                        <td>{{ $m->name }}</td>
                                                        <td>{{ $m->email }}</td>
                                                        <td>ads</td>
                                                        <td>ads</td>
                                                        <td>ads</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                    </div>
                
                    <div class="col-md-12 m-2">
                        
                            <div class="card w-100 text-white border-0" style="">
                                    <div class="card-body" style="background-color:#53d3e8;border-radius:10px;">
                                        
                                            <div class="input-group-prepend w-100 mb-2">
                                                    <span class="input-group-text bg-dark text-white label-card">
                                                            
                                <img src="https://img.icons8.com/color/48/000000/student-male.png" class="icon-colored"> Student</span>
                                                </div><br>
                                        <table id="tabel_std" class="table table-striped table-bordered table-hover table-borderless" style="width:100%">
                                                <thead class="text-white">
                                                    <tr style="background-color:#0a336b;" class="text-center">
                                                        <th>Judul soal</th>
                                                        <th>Pelajaran</th>
                                                        <th>Mentor</th>
                                                        <th>Status</th>
                                                        <th>Status Mengerjakan</th>
                                                        <th>Hasil</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-white">
                                                    <tr>
                                                            <td>ads</td>
                                                            <td>ads</td>
                                                            <td>ads</td>
                                                            <td>ads</td>
                                                            <td>ads</td>
                                                            <td>ads</td>
                                                    </tr>
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
    </script>
@endsection
