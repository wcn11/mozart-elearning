<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PelajaranController extends Controller
{
    public function index(){
        return view("mentor.pages.pelajaran");
    }
}
