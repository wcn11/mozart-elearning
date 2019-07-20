<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;

class StudentController extends Controller
{
    public function index(){
        $student = Student::all();

        return view("master.student", compact("student"));
    }
    public function delete_student($id){

        $student = Student::find($id);

        $student->delete();

        return redirect()->back();
    }
}
