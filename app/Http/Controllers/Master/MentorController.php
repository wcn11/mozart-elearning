<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mentor;
use Illuminate\Support\Facades\Session;

class MentorController extends Controller
{
    

    public function mentor(){
        $mentor = Mentor::all();

        return view("master.mentor", compact("mentor"));
    }

    public function delete_mentor($id){
        $mentor = Mentor::find($id);

        $mentor->delete();

        Session::flash("mentor_terhapus", "terhapus");

        return redirect()->back();
    }
}
