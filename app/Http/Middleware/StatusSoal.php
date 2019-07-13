<?php

namespace App\Http\Middleware;

use Closure;
use App\Nilai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Hasil;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use App\Soal_judul;

class StatusSoal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('student')->check()){

            $nilai = Nilai::where("student_id", Auth::guard('student')->user()->id)->where('status', "mengerjakan")->get();
        
            if(count($nilai) > 0){

                $id = $nilai[0]['soal_judul_id'];

                $nilai_id = Nilai::where("soal_judul_id", $id)->get();
    
                $sji = Soal_judul::find($id);

                if( now() > $sji->tanggal_selesai){

                    if(count($nilai_id) > 0){
                        $nilai = Nilai::find($nilai_id[0]['id']);

                        $nilai->status = "selesai";
                        
                        $nilai->update();

                        return redirect()->route('student.soal'); 

                    }else{
                        return redirect()->route('student.soal'); 
                    }

                }else{

                    if(count($nilai) > 0 ){

                        $hasil = Hasil::where("soal_judul_id", $nilai[0]['soal_judul_id'])->get();

                        $id_hasil_terakhir = $hasil[$hasil->count() - 1 ]['id'];

                        $jawaban = Hasil::find($id_hasil_terakhir);

                        Session::flash("jawaban", $jawaban->jawaban);

                        $id_encrypted = Crypt::encrypt($nilai[0]['soal_judul_id']);

                        $id_param = $id_encrypted;

                        return Redirect::to("student/soal/mengerjakan/".$id_encrypted ."/". $id_param ."?page=".$hasil->count());

                    }

                }
            
            }
        }

        return $next($request);
    }
}
