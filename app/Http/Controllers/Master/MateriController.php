<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Materi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
class MateriController extends Controller
{
    public function index(){
        $materi = Materi::all();

        // foreach($materi as $m){
        //     echo $m->pelajaran["nama_pelajaran"];
        // }

        return view("master.materi" , compact("materi"));
    }

    public function delete_materi($id){
        $materi = Materi::find($id);

        $materi->delete();

        Session::flash("materi_terhapus","trhapus");

        return redirect()->back();
    }

    public function baca_materi($id){
        $id_decrypted = Crypt::decrypt($id);

        $materi = Materi::find($id_decrypted);

        return view("master.baca_materi", compact("materi"));
    }
}
