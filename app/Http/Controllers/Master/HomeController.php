<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Mentor;
use App\Student;
use App\Materi;
use App\Soal_judul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Master;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $redirectTo = '/master/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('master.auth:master');
    }

    /**
     * Show the Master dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $mentor = Mentor::all();
        $student = Student::all();
        $materi = Materi::all()->count();
        $soal = Soal_judul::all()->count();

        return view('master.home', compact("mentor", "student", "materi", "soal"));
    }

    public function changePassword(Request $request)
    {
        $current_password =  Auth::guard('master')->user()->password;
        if($request->current_password == ""){
            return array("status_password" => "kosong");
        }elseif($request->password_baru == ""){
            return array("status_password" => "kosong");
        }elseif($request->password_confirmation == ""){
            return array("status_password" => "kosong");
        }else{

            if(Hash::check($request->current_password, $current_password)){
    
                if($request->password_baru === $request->password_confirmation){
    
                    if((Hash::check($request->password_baru, $current_password))){
                        return array("status_password" => "password_sama_dengan_lama"); //benars
                    }else{
                        $user_id = Auth::guard('master')->user()->username;
                        $user = Master::find($user_id);
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

}