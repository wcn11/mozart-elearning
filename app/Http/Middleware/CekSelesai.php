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
        if(Session::has("id_url")){
            $id = Crypt::decrypt(Session::get("id_url"));

            $ambil_id = Nilai::where("soal_judul_id", $id)->get();

            if(count($ambil_id) > 0){
    
                if($ambil_id[0]['status'] == "selesai"){
                    return redirect()->route("student.soal");
                }
                
            }else{
                Session::flash('nilai', "tidak ada");
            }
    
        }


        
        return $next($request);
    }
}
