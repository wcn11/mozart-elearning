<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Soal_judul;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
class BatasWaktu
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
        date_default_timezone_set('Asia/Jakarta');

        $student_id = Auth::guard('student')->user()->id;
        $soal_judul_id = Crypt::decrypt($request->id);
        $soal_judul = Soal_judul::find($soal_judul_id);

        $waktu_selesai = $soal_judul->tanggal_selesai;
        
        if(now() > $waktu_selesai){

            Session::put('md', $soal_judul->judul);

            return redirect()->route('student.soal');

        }else{
            Session::put('md', $soal_judul_id);
        }

        return $next($request);
    }
}
