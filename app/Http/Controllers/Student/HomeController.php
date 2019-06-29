<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Mentor;
use App\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    protected $redirectTo = '/student/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('student.auth:student');
        if (Auth::guard('student')->check()) {
            $student = Student::find(Auth::guard('student')->user()->id);
            if (empty($student->mentor_id)) {
                return redirect()->route('student.mentor');
            } elseif (!empty($student->mentor_id)) {
                return redirect()->route('student.materi');
            }
        }
    }

    /**
     * Show the Student dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.home');
    }
    public function mentor()
    {
        $mentor = Mentor::all();
        return view('student.mentor', compact('mentor'));
    }
    public function ikuti($id)
    {
        $student = Student::find(Auth::guard('student')->user()->id);

        $student->mentor_id = $id;

        $student->update();

        Session::flash('berhasil_mengikuti', "Anda berhasil mengikuti");

        return redirect()->route('student.materi');
    }
}
