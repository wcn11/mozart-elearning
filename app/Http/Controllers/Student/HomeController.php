<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Mentor;
use App\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
        // if (Auth::guard('student')->check()) {
        //     $student = Student::find(Auth::guard('student')->user()->id);
        //     if (empty($student->mentor_id)) {
        //         return redirect()->route('student.mentor');
        //     } elseif (!empty($student->mentor_id)) {
        //         return redirect()->route('student.materi');
        //     }
        // }
        // $mentor_id = Auth::guard('mentor')->user()->id;

        // $mentor = Mentor::find($mentor_id);

        // if($mentor->email_verified_at == null){
        //     Session::put('belum_verifikasi', "Email anda harus diverifikasi terlebih dahulu");
        // }
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
        $student = Student::find(Auth::guard('student')->user()->id_student);

        $student->mentor_id = $id;

        $student->update();

        Session::flash('berhasil_mengikuti', "Anda berhasil mengikuti");

        return redirect()->route('student.materi');
    }

    public function profil()
    {
        $student = Student::find(Auth::guard('student')->user()->id_student);

        return view('student.profil', compact('student'));
    }

    public function profil_update(Request $request)
    {
        // echo $request->foto;
        $student = Student::find(Auth::guard('student')->user()->id_student);
        $student->name = $request->name;
        $student->email = $request->email;
        // menyimpan data file yang diupload ke variabel $file
        if ($request->has('file')) {

            $file = $request->file('file');

            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'images';
            $file->move($tujuan_upload, $nama_file);

            $student->foto = $nama_file;
        }
        $student->save();

        Session::flash('update_profil', 'Update profil, berhasil!');
        return redirect()->back();
    }
}
