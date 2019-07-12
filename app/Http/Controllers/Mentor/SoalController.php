<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Pelajaran;
use App\Soal;
use App\Soal_pilihan;
use App\Tes;
use App\Soal_judul;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use App\Tes_pilihan;
use PhpParser\Node\Stmt\Switch_;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Faker\Provider\zh_TW\DateTime;
use Illuminate\Support\Facades\Date;

class SoalController extends Controller
{
    public function index()
    {
        $soal_judul = Soal_judul::where('mentor_id', Auth::guard('mentor')->user()->id)->get();

        $pelajaran = Pelajaran::all();

        return view('mentor.pages.question.index', ['sj' => $soal_judul, 'pelajaran' => $pelajaran]);
    }

    public function soal_read($soal_judul_id)
    {
        $id = Crypt::decrypt($soal_judul_id);

        $soal = Soal::where('soal_judul_id', $id)->inRandomOrder()->get();

        foreach ($soal as $s) {
            echo $s->soal_pilihan;
        }

        // return view('mentor.pages.pertanyaan.index');
    }

    public function tes()
    {   
        $soal = Soal_judul::find(500934080001);

        date_default_timezone_set('Asia/Jakarta');
        
        // if(now() < $soal->tanggal_mulai){
        //     echo "Kerjakan";
        // }else{
        //     echo "telah lewat";
        // }

        if(now() > $soal->tanggal_selesai){
            echo "lewat";
        }elseif(now() > $soal->tanggal_mulai){
            echo "kerjakan"; 
        }else{
            echo "belum waktunya";
        }
    }

    public function question_create_title(Request $request)
    {
        $mentor_id = Auth::guard('mentor')->user()->id;

        $m = Soal_judul::max("id");
        $s = substr($m, 5)+1;
        $mid = substr($mentor_id, 5, 5);
        $nomor = sprintf( "%04s", $s);

        $tanggal_mulai  = $request->tanggal_mulai;
        $jam_mulai      = $request->jam_mulai;

        $sub_tjm = $tanggal_mulai . " ". $jam_mulai. ":00";

        $tanggal_selesai  = $request->tanggal_selesai;
        $jam_selesai     = $request->jam_selesai;

        $sub_tjs = $tanggal_selesai . " ". $jam_selesai. ":00";
    

        $sj = new Soal_judul;

        $sj->id = 5
                .$mid
                .$request->pelajaran_id
                .$nomor;

        $sj->pelajaran_id = $request->pelajaran_id;

        $sj->mentor_id = $mentor_id;

        $sj->judul = $request->judul;

        $sj->jumlah_soal = $request->jumlah_soal;

        $sj->tanggal_mulai = $sub_tjm;

        $sj->tanggal_selesai = $sub_tjs;

        $sj->save();

        $soal_judul = Soal_judul::find($sj->id);

        return view('mentor.pages.question.question_create', compact('soal_judul'));
    }

    public function data_persoal(Request $request){
        $id = Soal_judul::find($request->id);

        return response()->json($id);
    }

    public function question_update_title(Request $r){

        $sj = Soal_judul::find($r->id);

        $sj->pelajaran_id   = $r->pelajaran_id_update;
        $sj->judul          = $r->judul_update;
        $sj->jumlah_soal    = $r->jumlah_soal_update;
        $sj->tanggal_mulai  = $r->tgl_mulai_update  . " " . $r->jam_mulai_update. ":00";
        $sj->tanggal_selesai  = $r->tanggal_selesai_update . " " . $r->jam_selesai_update. ":00";
        $sj->save();

        Session::flash("berhasil_update_judul", "berhasil_update_judul");

        return redirect()->back();
    }

    public function question_create_questions(Request $request)
    {
        $soal_judul_id = $request->soal_judul_id;

        $mentor_id = Auth::guard('mentor')->user()->id;

        for ($i = 0; $i < count($request->pertanyaan); $i++) {
            Soal::create([
                'mentor_id' => 1,
                'soal_judul_id' => $request->soal_judul_id,
                'pertanyaan' => $request->pertanyaan[$i],
                'pilihan1' => $request->pilihan1[$i],
                'pilihan2' => $request->pilihan2[$i],
                'pilihan3' => $request->pilihan3[$i],
                'pilihan4' => $request->pilihan4[$i],
                'pilihan5' => $request->pilihan5[$i],
                'pilihan_benar' => $request->pilihan_benar[$i]
            ]);
        }

        Session::flash("buat_soal");

        return redirect()->route('mentor.soal');
    }

    public function soal_delete($id)
    {
        $soal = Soal_judul::find($id);

        $soal->delete();

        Session::flash("hapus_soal");

        return back();
    }


    public function soal_judul(Request $request)
    {
        Soal_judul::create($request->all());
    }

    public function question_create(Request $request)
    {
        $soal = Soal::create($request->all());

        $mentor_id = Soal::find($soal->id);

        $mentor_id->mentor_id = Auth::guard('mentor')->user()->id;

        $mentor_id->save();

        foreach ($request->pilihan as $key => $value) {
            $benar = $request->pilihan_benar == $key ? 1 : 0;
            Soal_pilihan::insert([
                'soal_id' => $soal->id,
                'pilihan' => $value,
                'pilihan_benar' => $benar
            ]);
        }
    }

    public function hasil($id)
    {
        $test = Tes::find($id)->load('user');

        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get();
        }

        return view('results.show', compact('test', 'results'));
    }

    public function soal_edit($id)
    {
        $soal_judul = Soal_judul::find($id);
        $soal = Soal_judul::find($id)->soal;

        return view("mentor.pages.question.question_edit", ['soal' => $soal, 'soal_judul' => $soal_judul]);

        // foreach ($soal_judul->soal as $s) {
        //     echo $s->pilihan_benar;
        // }

        // for ($i = 0; $i < $soal_judul->jumlah_soal; $i++) {
        //     echo $soal[$i]['pertanyaan'];
        // }
    }

    public function soal_update(Request $request)
    {
        $mentor_id = Auth::guard('mentor')->user()->id;

        for ($i = 0; $i < count($request->pertanyaan); $i++) {
            $soal = Soal::find($request->soal_id[$i]);
            $soal->soal_judul_id = $request->soal_judul_id;
            $soal->pertanyaan = $request->pertanyaan[$i];
            $soal->pilihan1  = $request->pilihan1[$i];
            $soal->pilihan2  = $request->pilihan2[$i];
            $soal->pilihan3  = $request->pilihan3[$i];
            $soal->pilihan4  = $request->pilihan4[$i];
            $soal->pilihan5  = $request->pilihan5[$i];
            $soal->pilihan_benar = $request->pilihan_benar[$i];
            $soal->save();
        }

        Session::flash("update_soal");

        return redirect()->route('mentor.soal');
    }
}
