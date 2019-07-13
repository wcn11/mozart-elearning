<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Soal_judul;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
class BatasWaktu
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
            date_default_timezone_set('Asia/Jakarta');

            $param = $request->route('id_param');

            $id = Crypt::decrypt($param);

            $soal_judul = Soal_judul::find($id);

            $waktu_selesai = $soal_judul->tanggal_selesai;
            
            if(now() > $waktu_selesai){

                Session::flash('lewat', $soal_judul->judul);

                if($request->ajax()){
                    return response()->json(array("telah_lewat" => "lewat"));         
                }else{
                    return redirect()->route('student.soal'); 
                }

            }else{
                Session::flash('belum', $soal_judul->judul);
            }
        return $next($request);
    }
}
