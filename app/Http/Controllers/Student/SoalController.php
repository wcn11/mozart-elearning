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
use PDF;

class SoalController extends Controller
{
    public function index()
    {
        $mentor_id = Student::find(Auth::guard('student')->user()->id);
        $soal = Soal_judul::where("mentor_id", $mentor_id->mentor_id)->get();
        
        $status = [];
        for($i = 0; $i < count($soal); $i++){

            $nilai = Nilai::where("soal_judul_id", $soal[$i]['id'])->where('student_id', Auth::guard("student")->user()->id)->get();

            if(!empty($nilai)){
                $status[] = array(
                    'status' => "selesai"
                );                
            }else{
                $status[] = array(
                    'status' => "belum"
                );     
            }

        }

        return view('student.soal', compact('soal', 'status'));
    }

    public function soal_mengerjakan($id)
    {
        $kode = Crypt::decrypt($id);
        $soal = Soal::where("soal_judul_id", $kode)->paginate(1);
        $soal_judul = Soal_judul::find($kode);
        return view('student.soal_mengerjakan', compact('soal', 'soal_judul'));
    }

    public function soal_update(Request $request)
    {

        $cek = Hasil::firstOrNew(array('soal_id' => $request->soal_id));

        $cek->soal_id = $request->soal_id;
        
        $cek->soal_judul_id = $request->soal_judul_id;

        $cek->student_id = Auth::guard('student')->user()->id;

        if(empty($request->jawaban)){

            $cek->jawaban = null;

        }else {
            $cek->jawaban = $request->jawaban;
        }

        $cek->save();
    }

    public function soal_edit($id){
        $soal_judul_id = Crypt::decrypt($id);

        $hasil = Hasil::where('soal_judul_id', $soal_judul_id)->get();

        $mentor_id = Student::find(Auth::guard('student')->user()->id);

        $soal_judul = Soal_judul::find($soal_judul_id);

        $soal = Soal::where('soal_judul_id', $soal_judul_id)->orWhere('mentor_id', $mentor_id->mentor_id)->get();

        return view('student.soal_edit_semua', ['hasil' => $hasil, 'soal' => $soal, 'soal_judul' => $soal_judul]);
    }

    public function soal_edit_persoal($id, $nomor){
        $soal_id = Crypt::decrypt($id);

        $soal = Soal::find($soal_id);

        $soal_judul = Soal_judul::find($soal->soal_judul_id);

        $hasil = Hasil::where('soal_judul_id', $soal->soal_judul_id)->where('soal_id', $soal_id)->get();

        return view('student.soal_edit_persoal', compact('soal', 'soal_judul', 'nomor', 'hasil'));

        echo $hasil[0]['jawaban'];
    }

    public function soal_nilai($id)
    {
        $soal = Soal::where('soal_judul_id',$id)->get();
        $hasil = Hasil::where('soal_judul_id',$id)->get();
        $jumlah_soal = Soal_judul::find($id);

        $nilai = 0;
        for($i = 0; $i < $jumlah_soal->jumlah_soal; $i++){
            if($soal[$i]['pilihan_benar'] == $hasil[$i]['jawaban']){
                $nilai+=1;
            }
        }
        Nilai::create([
            'student_id' => Auth::guard('student')->user()->id,
            'nilai' => $nilai,
            'soal_judul_id' => $id
        ]);

        return redirect()->route('student.nilai_review', $id);
    }

    public function soal_nilai_review($id){

        $soal_judul = Soal_judul::find($id);

        $soal = Soal::where('soal_judul_id', $id)->get();

        $hasil = Hasil::where("soal_judul_id", $id)->where('student_id', Auth::guard('student')->user()->id)->get();

        $nilai = Nilai::where("soal_judul_id", $id)->where('student_id', Auth::guard('student')->user()->id)->get();

        return view('student.soal_nilai_review', compact('soal_judul', 'soal', 'hasil', 'nilai'));
    }

    public function soal_nilai_cetak($id){

        $soal_judul = Soal_judul::find($id);

        $soal = Soal::where('soal_judul_id', $id)->get();

        $hasil = Hasil::where("soal_judul_id", $id)->where('student_id', Auth::guard('student')->user()->id)->get();

        $nilai = Nilai::where("soal_judul_id", $id)->where('student_id', Auth::guard('student')->user()->id)->get();

        $pdf = \PDF::loadview("student.soal_nilai_cetak", compact('soal_judul', 'soal', 'hasil', 'nilai'));
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);;
        $pdf->setOption('no-stop-slow-scripts', true);

        return $pdf->download('cetak.pdf');
    }
}