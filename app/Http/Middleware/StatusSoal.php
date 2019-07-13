<?php

namespace App\Http\Middleware;

use Closure;
use App\Nilai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Hasil;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

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
    
            if(count($nilai) > 0 ){
                $hasil = Hasil::where("soal_judul_id", $nilai[0]['soal_judul_id'])->get();

                $id_hasil_terakhir = $hasil[$hasil->count() - 1 ]['id'];

                $jawaban = Hasil::find($id_hasil_terakhir);

                Session::flash("jawaban", $jawaban->jawaban);

                $id_encrypted = Crypt::encrypt($nilai[0]['soal_judul_id']);

                $id_param = $id_encrypted;

                return Redirect::to("student/soal/mengerjakan/".$id_encrypted ."/". $id_param ."?page=".$hasil->count());

            }else{
                Session::flash("jawaban", "tidak ada");
            }
        }

        return $next($request);
    }
}
