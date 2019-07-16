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
        $mentor = Student::all();
        
        foreach($mentor as $m){
            echo $m->pelajaran;
            
        }

        // for($i; $i < count($mentor); $i++){
        //     echo $mentor[$i]['name']."<br>";
        //     if($i < $ji){
        //         if($ikut[$i]["id_mentor"] == $mentor[$i]['id_mentor']){
        //             echo "ikut.<br>";
        //         }else{
        //             echo "kaga.<br>";
        //         }
        //     }else{
        //         echo "kaga2.<br>";
        //     }
        //     }
        
        // $js = [];

        // for($i = 0; $i < count($mentor); $i++){
        //     $js2 = Mentors_student::where("id_mentor", $mentor[$i]['id_mentor'])->get();

        //     $js[] = array(
        //         $mentor[$i]['id_mentor'] => count($js2)
        //     );
        // }
        // print_r(array_keys($js[0])[0]);

        // $pelajaran = Pelajaran::where("id_student", Auth::guard("student")->user()->id_student)->get();

        // if($pelajaran < 0){
        //     $mapel = Pelajaran::all();
        // }else{
        //     // $mapel = $pelajaran;
        //     $mentor = Me
        // }


        // return view("student.mentor", compact('mentor',"js"));
    }

    public function ambildata(Request $request){

        $id_mentor = $request->id_mentor;

        $jumlah_student = count(Mentors_student::where("id_mentor", $id_mentor)->get());

        if($jumlah_student > 0){
            
            $mentor = Mentor::find($id_mentor);

            $jumlah_kuota = $mentor->kuota;

            return response()->json(
                array(
                    "kuota" => "ada", "jumlah_kuota" => $jumlah_kuota, "jumlah_student" => $jumlah_student
                    )
                );
        }else{
            return response()->json(array("kuota" => "kosong"));
        }
    }

    
    public function ikuti($id){
        date_default_timezone_set("Asia/Jakarta");

        $id_mentor = $id;

        $mentor = Mentor::find($id);

        $mentor_slash = strrpos($id_mentor, "-");

        $mentor_substr = substr($id_mentor, $mentor_slash + 1);

        $student_slash = strrpos(Auth::guard("student")->user()->id_student, "-");

        $student_substr = substr(Auth::guard("student")->user()->id_student, $student_slash + 1);

        Mentors_student::firstOrCreate([
            "kode_mengikuti" => "IKT-".$mentor_substr."-".$student_substr,
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
