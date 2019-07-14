<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Pelajaran;
use Illuminate\Support\Facades\Session;

class CekAdaPelajaran
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
        if(Auth::guard("mentor")->check()){
            $id_mentor = Auth::guard('mentor')->user()->id_mentor;
            $cp = Pelajaran::where("id_mentor", $id_mentor)->get();
            if(count($cp) > 0){
                Session::forget("pelajaran_kosong");
            }else{
                Session::put("pelajaran_kosong", "kosong");
                return redirect()->route("mentor.mapel");
            }
        }
        return $next($request);
    }
}
