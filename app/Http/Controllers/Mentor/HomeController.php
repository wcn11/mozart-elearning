<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Mentor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    protected $redirectTo = '/mentor/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('mentor.auth:mentor');
    }

    /**
     * Show the Mentor dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $cek_email = Mentor::select('email_verified_at')->where('email', Auth::guard('mentor')->user()->email)->get();

        // foreach ($cek_email as $t) {
        //     if ($t->email_verified_at == null) {
        //         Session::flash('belum_verifikasi', 'Kamu harus segera mengkonfirmasi email kamu');
        //     } else {
        //         $request->session()->forget('pesan');
        //     }
        // }
        // $request->session()->put('id_mentor', Auth::guard('mentor')->user()->id_mentor);

        // $mentor = Mentor::find(Auth::guard('mentor')->user()->id_mentor);
        return view('mentor.home');
    }

    public function profil()
    {
        $mentor = Mentor::find(Auth::guard('mentor')->user()->id_mentor);
        return view('mentor.pages.profil', compact('mentor'));
    }

    public function profil_update(Request $request)
    {
        // echo $request->foto;
        $mentor = Mentor::find(Auth::guard('mentor')->user()->id_mentor);
        $mentor->name = $request->name;
        $mentor->email = $request->email;
        // menyimpan data file yang diupload ke variabel $file
        if ($request->has('file')) {

            $file = $request->file('file');

            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'images';
            $file->move($tujuan_upload, $nama_file);

            $mentor->foto = $nama_file;
        }
        $mentor->save();

        Session::flash('update_profil', 'Update profil, berhasil!');
        return redirect()->back();
    }


    public function changePassword(Request $request)
    {
        $current_password =  Auth::guard('mentor')->user()->password;

        if(Hash::check($request->current_password, $current_password)){

            if($request->password_baru === $request->password_confirmation){

                if((Hash::check($request->password_baru, $current_password))){
                    return array("status_password" => "password_sama_dengan_lama"); //benars
                }else{
                    $user_id = Auth::guard('mentor')->user()->id_mentor;
                    $user = Mentor::find($user_id);
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
