<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mentor;
use App\Mentors_student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Pelajaran;
use App\Student;

class MentorController extends Controller
{
    public function index(){
        $mentor = Mentor::all();

        return view("student.mentor", compact('mentor'));
    }

    public function ambildata(Request $request){

        $id = Auth::guard("student")->user()->id_student;

        $std = Student::find($id);

        return $std->mentor;
    }

    public function ambildatafull(){ // mentor dengan kuota yang sudah penuh

        $k = Mentor::all();

        $b = [];
        foreach($k as $a){
            $b[] = 
            array(
                "id_mentor" => $a->id_mentor, 
                "kuota-kini" => count($a->student), 
                "kuota" => $a->kuota
            );
        }

        return $b;

    }

    
    public function ikuti($id){
        date_default_timezone_set("Asia/Jakarta");

        $id_mentor = $id;

        $mentor_student = Mentors_student::max("kode_mengikuti");

        $mentor_student_slash = strrpos($mentor_student, "-");

        $mentor_student_substr = substr($mentor_student, $mentor_student_slash + 1)+1;

        $mentor = Mentor::find($id);

        $mentor_slash = strrpos($id_mentor, "-");

        $mentor_substr = substr($id_mentor, $mentor_slash + 1);

        $student_slash = strrpos(Auth::guard("student")->user()->id_student, "-");

        $student_substr = substr(Auth::guard("student")->user()->id_student, $student_slash + 1);

        Mentors_student::firstOrCreate([
            "kode_mengikuti" => "IKT-".$mentor_substr."-".$student_substr."-".$mentor_student_substr,
            "id_mentor" => $id,
            "id_student" => Auth::guard("student")->user()->id_student,
            "tanggal_mengikuti" => now()
        ]);

        Session::flash("berhasil_mengikuti", $mentor->name);
        return redirect()->back();
    }

    public function unfollow($id){
        $nama_mentor = Mentor::find($id);

        $mentor = Mentors_student::where("id_mentor", $id)->where("id_student", Auth::guard("student")->user()->id_student)->get();

        $ms = Mentors_student::find($mentor[0]['kode_mengikuti']);

        $ms->delete();

        Session::flash("berhasil_unfollow", $nama_mentor->name);

        return redirect()->back();
    }
}
