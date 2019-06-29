<?php

namespace App\Http\Middleware;

use Closure;
use App\Student;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
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
        $student = Student::find(Auth::guard('student')->user()->id);

        if ($student->mentor_id == null) {
            return redirect('student/mentor');
        } else {
            return redirect('student/dashboard');
        }
        return $next($request);
    }
}
