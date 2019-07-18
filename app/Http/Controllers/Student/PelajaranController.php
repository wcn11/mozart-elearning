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

        $mentor = Mentors_student::where("id_student", $id_std)->get();

        $data = [];
        for($i = 0; $i < count($mentor); $i++){
            $data[] = array(Mentor::find($mentor[$i]["id_mentor"]));
            // echo $data[$i][0]["name"]."<br>";
        }
        $jumlah = count($mentor);
        
        return view("student.pelajaran", compact("data", "jumlah"));
    }

    public function ambildata(Request $request){
        $id = $request->id_mentor;

        $mentor = Mentor::find($id);

        return $mentor->pelajaran;
    }
}
