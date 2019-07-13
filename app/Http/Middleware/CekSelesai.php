<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Crypt;
use App\Nilai;
use Illuminate\Support\Facades\Session;

class CekSelesai
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
        // if(Session::has("id_url")){
        //     $id = Crypt::decrypt(Session::get("id_url"));

        //     $ambil_id = Nilai::where("soal_judul_id", $id)->get();

        //     if(count($ambil_id) > 0){
    
        //         if($ambil_id[0]['status'] == "selesai"){
        //             return redirect()->route("student.soal");
        //         }
                
        //     }else{
        //         Session::flash('nilai', "tidak ada");
        //     }
    
        // }

        $param = $request->route('id_param');

        $id = Crypt::decrypt($param);

        $nilai = Nilai::where("soal_judul_id", $id)->get();

        if(count($nilai) > 0){

            if($nilai[0]['status'] == "selesai"){

                if($request->ajax()){
                    return response()->json(array("telah_selesai" => "selesai"));
                }else{
                    return redirect()->route("student.soal");
                }

            }
        }

        return $next($request);
    }
}
