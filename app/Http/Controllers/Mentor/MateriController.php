<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Materi;
use Illuminate\Support\Facades\Auth;
use App\Pelajaran;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use PDF;

class MateriController extends Controller
{
    public function index()
    {
        $mentor_id = Auth::guard('mentor')->user()->id;

        $materi = Materi::all()->where('mentor_id', $mentor_id);

        return view('mentor.pages.materi.index', ['materi' => $materi]);
    }

    public function materi_upload()
    {
        $pelajaran = Pelajaran::all();

        return view('mentor.pages.materi.materi_upload', ['pelajaran' => $pelajaran]);
    }


    public function materi_upload_aksi(Request $r)
    {
        $m = Materi::max("id");
        $s = substr($m, 4)+1;
        $nomor = sprintf( "%04s", $s);

        $messages = [
            "required" => "Field :attribute harus diisi",
        ];

        $this->validate($r, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ])->$messages;

        $mentor_id = Auth::guard('mentor')->user()->id;

        $materi = new Materi;

        $materi->id = 3
                    .$r->pelajaran_id.$nomor;

        $materi->judul_materi = $r->judul;

        $materi->mentor_id = $mentor_id;

        $materi->pelajaran_id = $r->pelajaran_id;

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

    public function materi_edit($id)
    {
        $video_id = Crypt::decrypt($id);

        $pelajaran = Pelajaran::all();

        $materi = Materi::find($video_id);

        return view('mentor.pages.materi.materi_edit', ['m' => $materi, 'pelajaran' => $pelajaran]);
    }

    public function materi_update(Request $r)
    {
        $materi_id = Crypt::decrypt($r->id);

        $materi = Materi::find($materi_id);

        $materi->judul_materi = $r->judul;

        $materi->pelajaran_id = $r->pelajaran_id;

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

        $pdf = PDF::loadView('mentor.pages.materi.pdf', compact('materi'));

        return $pdf->download($materi->judul_materi . '.pdf');
    }
}
