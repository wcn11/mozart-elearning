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
        // $file = $r->file('video');

        $mentor_id = Auth::guard('mentor')->user()->id;

        $materi = new Materi;

        $materi->judul_materi = $r->judul;

        $materi->mentor_id = $mentor_id;

        $materi->pelajaran_id = $r->pelajaran_id;

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
