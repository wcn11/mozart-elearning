<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Mentor;
use App\Mentors_student;
use App\Pelajaran;
use App\Student;

class PelajaranController extends Controller
{
    public function index(){
        $id_std = Auth::guard("student")->user()->id_student;

        $mntr = Mentors_student::where("id_student", $id_std)->get();

        // foreach($mntr as $m){
        //     $mapel = Pelajaran::where("id_mentor", $m->id_mentor)->get();
        //     echo $mapel."<br>";
        // }
        
        
        // return view("student.pelajaran", compact("mntr"));
    }
}
