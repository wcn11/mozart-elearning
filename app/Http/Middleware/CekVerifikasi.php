<?php

namespace App\Http\Middleware;

use Closure;
use App\Mentor;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Student;

class CekVerifikasi
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

            $mentor_id = Auth::guard('mentor')->user()->id_mentor;

            $mentor = Mentor::find($mentor_id);

            if($mentor->email_verified_at == null){
                Session::flash('belum_verifikasi', "Email anda harus diverifikasi terlebih dahulu");
            }
            
        }
        return $next($request);
    }
}
