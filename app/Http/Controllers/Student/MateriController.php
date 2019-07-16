<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mentors_student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\Mentor;
use App\Materi;

class MateriController extends Controller
{
    function __construct()
    {
        $this->middleware('student.auth:student');
        // if (Auth::guard('student')->check()) {
        //     $student = Student::find(Auth::guard('student')->user()->id_student);
        //     if (empty($student->id_mentor)) {
        //         return redirect()->route('student.mentor');
        //     } elseif (!empty($student->mentor_id)) {
        //         return redirect()->route('student.materi');
        //     }
        // }
    }

    public function index()
    {
        return view('student.home');
    }
    public function materi()
    {
        $id_student = Auth::guard('student')->user()->id_student;
        // $materi = Materi::where('id_mentor', Auth::guard('student')->user()->id_student)->get();
        // return view('student.materi', compact('materi'));
        $mentor = Mentors_student::where("id_student", $id_student)->get();

        // $materi = Materi::where("materi")
    }

    public function materi_read($id)
    {
        $materi = Materi::find($id);

        return view('student.materi_read', compact('materi'));
    }
}
