<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Student;
use Illuminate\Support\Facades\Session;
class StudentVerified
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
        $id_student = Auth::guard('student')->user()->id_student;

        $student = Student::find($id_student);

        if($student->email_verified_at == null){
            Session::flash('belum_verifikasi', "Email anda harus diverifikasi terlebih dahulu");
        }
        return $next($request);
    }
}
