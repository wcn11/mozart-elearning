<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AntiKembali
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
        if(Session::has("status_soal") == "mulai"){
            Session::flash("tb", "mulai");
        }elseif(Session::has("status_soal") == "selesai"){
            Session::flash("tb", "sudah");
        }

        return $next($request);
    }
}
