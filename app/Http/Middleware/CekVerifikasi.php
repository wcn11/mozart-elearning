<?php

namespace App\Http\Middleware;

use Closure;
use App\Mentor;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
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
        $mentor_id = Auth::guard('mentor')->user()->id;

        $mentor = Mentor::find($mentor_id);

        if($mentor->email_verified_at == null){
            Session::flash('belum_verifikasi', "Email anda harus diverifikasi terlebih dahulu");
        }
        return $next($request);
    }
}