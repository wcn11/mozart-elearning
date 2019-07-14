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

        $id_mentor = Auth::guard('mentor')->user()->id_mentor;

        $mapel = Pelajaran::where("id_mentor", $id_mentor)->get();
        
        return view("mentor.pages.pelajaran", compact('mapel'));
    }

    public function ambilData(Request $request){
        $kode_mapel = $request->kode_mapel;
        $id_mentor = Auth::guard('mentor')->user()->id_mentor;

        $materi = Materi::where("kode_mapel" ,$kode_mapel)->where("id_mentor", $id_mentor)->count();

        $soal = Soal_judul::where("kode_mapel" ,$kode_mapel)->where("id_mentor", $id_mentor)->count();

        return response()->json(array("materi" => $materi, "soal" => $soal));
    }

    public function tambah(Request $request){

        $mapel = new Pelajaran;
        
        $id_mentor = Auth::guard('mentor')->user()->id_mentor;

        $mentor_slash = strrpos($id_mentor, "-");

        $mentor_substr = substr($id_mentor, $mentor_slash + 1);

        $mapel_max = Pelajaran::max("kode_mapel");

        $mapel_slash = strrpos($mapel_max, "-");

        $mapel_substr = substr($mapel_max, $mapel_slash +1) + 1;

        $mapel->kode_mapel = "MPL-". $mentor_substr ."-".$mapel_substr;

        $mapel->id_mentor = $id_mentor;

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
        $materi = Materi::where("kode_mapel", $id);

        $pdf = DOMPDF::loadview('student.cetak',[ 'student' => $materi]);
        return $pdf->download('student-pdf');
    }

    public function update(Request $request)
    {
        $kode_mapel = $request->kode_mapel;

        $np = $request->edit_nama_mapel;

        $mapel = Pelajaran::find($kode_mapel);

        $mapel->nama_pelajaran = $np;

        $mapel->update();

        Session::flash("berhasil_update_mapel", "berhasil");

        return redirect()->back();
    }
}
