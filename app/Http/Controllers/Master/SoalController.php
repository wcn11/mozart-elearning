<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Soal_judul;
use Illuminate\Support\Facades\Crypt;
use App\Soal;
use Illuminate\Support\Facades\Session;
class SoalController extends Controller
{
    public function index(){
        $soal = Soal_judul::all();

        return view("master.soal", compact("soal"));
    }
    public function lihat_soal($id){
        $ids = Crypt::decrypt($id);

        $soal_judul = Soal_judul::find($ids);

        $soal = Soal::where("kode_judul_soal", $ids)->get();

        return view("master.lihat_soal", ['soal' => $soal, 'soal_judul' => $soal_judul]);
    }
    public function delete_soal($id){

        $soal_judul = Soal_judul::find($id);

        $soal_judul->delete();

        Session::flash("soal_terhapus", "terhapus");

        return redirect()->back();
    }
}
