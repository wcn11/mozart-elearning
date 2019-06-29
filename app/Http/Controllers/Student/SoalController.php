<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Soal_judul;
use App\Student;
use Illuminate\Support\Facades\Auth;
use App\Soal;
use App\Hasil;
use App\Nilai;
use Illuminate\Support\Facades\Crypt;

class SoalController extends Controller
{
    public function index()
    {
        $mentor_id = Student::find(Auth::guard('student')->user()->id);
        $soal = Soal_judul::where("mentor_id", $mentor_id->mentor_id)->get();

        return view('student.soal', compact('soal'));
    }

    public function soal_mengerjakan()
    {
        $soal = Soal::where("soal_judul_id", 2)->paginate(1);
        $soal_judul = Soal_judul::find(2);
        return view('student.soal_mengerjakan', compact('soal', 'soal_judul'));

        // foreach ($soal as $s) {
        //     echo $s;
        // }
    }

    public function soal_update(Request $request)
    {
        $hasil = Hasil::updateOrCreate([
            'jawaban' => $request->jawaban,
            'soal_id' => $request->soal_id,
            'soal_judul_id' => $request->soal_judul_id
        ]);
        return response()->json(['success' => 'Data is successfully added']);
    }

    public function soal_hasil($id)
    {
        $kode = Crypt::decrypt($id);
        $soal_judul = Soal_judul::find($kode);
        $hasil = Hasil::where("soal_judul_id", $kode)->get();
        $soal = Soal::where("soal_judul_id", $kode)->get();

        for ($i = 0; $i < $soal_judul->jumlah_soal; $i++) {
            $hasil = Hasil::where("soal_judul_id", $kode)->get();
            $soal = Soal::where("soal_judul_id", $kode)->get();
        }
    }
}
