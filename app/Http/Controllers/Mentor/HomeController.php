<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Mentor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

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

        $cek_email = Mentor::select('email_verified_at')->where('email', Auth::guard('mentor')->user()->email)->get();

        foreach ($cek_email as $t) {
            if ($t->email_verified_at == null) {
                Session::flash('belum_verifikasi', 'Kamu harus segera mengkonfirmasi email kamu');
            } else {
                $request->session()->forget('pesan');
            }
        }
        $request->session()->put('id_mentor', Auth::guard('mentor')->user()->id);

        $mentor = Mentor::find(Auth::guard('mentor')->user()->id);
        return view('mentor.home', ['mentor' => $mentor]);
    }

    public function profil()
    {
        $mentor = Mentor::find(Auth::guard('mentor')->user()->id);
        return view('mentor.pages.profil', compact('mentor'));
    }

    public function profil_update(Request $request)
    {
        // echo $request->foto;
        $mentor = Mentor::find(Auth::guard('mentor')->user()->id);
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
}
