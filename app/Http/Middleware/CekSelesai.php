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
        $param = $request->route('id_param');

        $id = Crypt::decrypt($param);

        $nilai = Nilai::where("kode_judul_soal", $id)->get();

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
