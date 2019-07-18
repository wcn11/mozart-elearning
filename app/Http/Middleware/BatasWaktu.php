<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Soal_judul;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Nilai;

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

            $nilai_id = Nilai::where("kode_judul_soal", $soal_judul)->get();

            $waktu_selesai = $soal_judul->tanggal_selesai;
            
            if(now() > $waktu_selesai){

                Session::flash('lewat', $soal_judul->judul);

                if($request->ajax()){  

                    if(count($nilai_id) > 0){

                        $nilai = Nilai::find($nilai_id[0]['kode_nilai']);

                        $nilai->status = "selesai";
                        
                        $nilai->update();
    
                        return response()->json(array("telah_lewat" => "lewat"));

                    }else{
                        return response()->json(array("telah_lewat" => "lewat"));
                    }
                    

                }else{

                    if(count($nilai_id) > 0){
                        $nilai = Nilai::find($nilai_id[0]['kode_nilai']);

                        $nilai->status = "selesai";
                        
                        $nilai->update();
    
                        return redirect()->route('student.soal_permentor', $param); 

                    }else{
                        return redirect()->route('student.soal_permentor', $param); 
                    }

                    
                }

            }else{
                Session::flash('belum', $soal_judul->judul);
            }
        return $next($request);
    }
}
