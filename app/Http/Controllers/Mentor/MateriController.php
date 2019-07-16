<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Materi;
use Illuminate\Support\Facades\Auth;
use App\Pelajaran;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use DOMPDF;

class MateriController extends Controller
{
    public function index()
    {
        $id_mentor = Auth::guard('mentor')->user()->id_mentor;

        $materi = Materi::where('id_mentor', $id_mentor)->get();

        return view('mentor.pages.materi.daftar_materi', ['materi' => $materi]);

    }
    public function materi_upload()
    {
        $mapel = Pelajaran::all();

        return view('mentor.pages.materi.materi_upload', ['mapel' => $mapel]);
    }


    public function materi_upload_aksi(Request $r)
    {
        $m = Materi::max("kode_materi");
        $m_slash = strrpos($m, "-");
        $s = substr($m, $m_slash + 1) + 1;

        $pesan = [
            'required' => ":attribute harus diisi (Gambar/Cover)"

        ];

        $this->validate($r, [
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],$pesan);

        $id_mentor = Auth::guard('mentor')->user()->id_mentor;

        //ambil lalu slash lalu substr id mentor
        $mentor_slash = strrpos($id_mentor, "-");

        $mentor_substr = substr($id_mentor, $mentor_slash + 1);

        //ambil lalu slash lalu substr kode mapel

        $mapel_slash = strrpos($r->kode_mapel, '-');

        $mapel_substr = substr($r->kode_mapel, $mapel_slash + 1);

        //masukkan ke database

        $materi = new Materi;

        $materi->kode_materi = "MTRI-".$mentor_substr."-".$mapel_substr.'-'.$s;

        $materi->judul_materi = $r->judul;

        $materi->id_mentor = $id_mentor;

        $materi->kode_mapel = $r->kode_mapel;

        if ($r->has('file')) {

            $file = $r->file('file');

            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'images/cover_materi/';
            $file->move($tujuan_upload, $nama_file);

            $materi->cover = $nama_file;
        }

        $materi->materi = $r->materi;

        $materi->save();

        Session::flash('success_upload_materi', 'Upload materi, berhasil!');

        return redirect()->route("mentor.materi");
    }

    public function materi_edit($kode_materi)
    {
        $id = Crypt::decrypt($kode_materi);
        
        $id_mentor = Auth::guard('mentor')->user()->id_mentor;

        $pelajaran = Pelajaran::where("id_mentor", $id_mentor)->get();

        $materi = Materi::find($id);

        return view('mentor.pages.materi.materi_edit', ['pelajaran' => $pelajaran, "m" => $materi]);
    }

    public function materi_update(Request $r)
    {
        $materi_id = Crypt::decrypt($r->kode_materi);

        $materi = Materi::find($materi_id);

        $materi->judul_materi = $r->judul;

        $materi->kode_mapel = $r->kode_mapel;

        $materi->materi = $r->materi;

        $materi->save();

        Session::flash('success_update_materi', 'Update materi, berhasil!');

        return redirect()->route("mentor.materi");
    }

    public function materi_destroy($id)
    {
        $materi_id = Crypt::decrypt($id);

        $materi = Materi::find($materi_id);

        $materi->delete();

        Session::flash('hapus_materi', "Berhasil hapus materi");

        return redirect()->route("mentor.materi");
    }

    public function downloadPDF($id)
    {
        $materi_id = Crypt::decrypt($id);
        $materi = Materi::find($materi_id);

        $pdf = DOMPDF::loadView('mentor.pages.materi.pdf', compact('materi'));

        return $pdf->download($materi->judul_materi . '.pdf');
    }
}
