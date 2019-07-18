<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Mentor;
use App\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function changePassword(Request $request)
    {
        $current_password =  Auth::guard('student')->user()->password;

        if(Hash::check($request->current_password, $current_password)){

            if($request->password_baru === $request->password_confirmation){

                if((Hash::check($request->password_baru, $current_password))){
                    return array("status_password" => "password_sama_dengan_lama"); //benars
                }else{
                    $user_id = Auth::guard('student')->user()->id_student;
                    $user = Student::find($user_id);
                    $user->password = Hash::make($request->password_baru);
                    $user->save();
                    return array("status_password" => "berhasil");
                }

            }else{
                return array("status_password" => "konfirmasi_tidak_sama");
            }
            
        }else{
            return array("status_password" => "salah");
        }

    }
}

