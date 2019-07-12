<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pelajaran;
use Illuminate\Support\Facades\Session;
use App\Materi;
use Illuminate\Support\Facades\Auth;
use App\Soal_judul;
use DOMPDF;
use App\Student;

class PelajaranController extends Controller
{
    public function index(){

        $mentor_id = Auth::guard('mentor')->user()->id;

        $mapel = Pelajaran::all();
        // date_default_timezone_set('Asia/Jakarta');
        // $waktu = now();
        // echo $waktu;
        return view("mentor.pages.pelajaran", compact('mapel'));
    }

    public function ambilData(Request $request){
        $mapel_id = $request->id;

        $materi = Materi::where("pelajaran_id" ,$mapel_id)->count();

        $soal = Soal_judul::where("pelajaran_id" ,$mapel_id)->count();

        return response()->json(array("materi" => $materi, "soal" => $soal));
    }

    public function tambah(Request $request){

        $mapel = new Pelajaran;

        $mapel->nama_pelajaran = $request->nama_pelajaran;

        $mapel->save();
    
        Session::flash('berhasil_tambah_mapel', "berhasil");

        return redirect()->back();

    }

    public function hapus($id)
    {
        $pelajaran = Pelajaran::find($id);

        $mapel = $pelajaran->nama_pelajaran;

        $pelajaran->delete();

        Session::flash("pelajaran_dihapus", "Mata pelajaran berhasil dihapus");

        // return redirect()->back();
    }

    public function cetak($id)
    {
        $materi = Materi::where("pelajaran_id", $id);

        $pdf = DOMPDF::loadview('student.cetak',[ 'student' => $materi]);
        return $pdf->download('student-pdf');
    }
}
