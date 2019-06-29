<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/master/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('master.auth:master');
    }

    /**
     * Show the Master dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('master.home');
    }

}