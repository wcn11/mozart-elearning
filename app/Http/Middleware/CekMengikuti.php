<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Mentors_student;
use Illuminate\Support\Facades\Session;
class CekMengikuti
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
        $id_student = Auth::guard("student")->user()->id_student;

        $std = Mentors_student::where("id_student", $id_student)->get();

        if(count($std) > 0){
            // Session::flash("belum_mengikuti");
        }else{
            Session::flash("belum_mengikuti", "belum");
            return redirect()->route("student.mentor");
        }
        return $next($request);
    }
}
