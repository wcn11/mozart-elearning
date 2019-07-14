<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Tugas;
use App\Mentor;
use App\Student;
use App\Data;
use Yajra\DataTables\DataTables;
use App\Mentors_student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor_id = Auth::guard('mentor')->user()->id_mentor;

        $student = Mentor::find($mentor_id);

        return view('mentor.pages.student.index', compact('student'));
    }

    public function getDataStudent()
    {
        $mentor_id = Auth::guard('mentor')->user()->id_student;


        // return Datatables::of(Mentor::all()->where('mentor_id', $mentor_id)->student)->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function addItem(Request $request, $id)
    {
        $rules = array(
            'name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array(

                'errors' => $validator->getMessageBag()->toArray()
            ));
        else {
            $data = new Data();
            $data->name = $request->name;
            $data->save();
            return response()->json($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {


        $user_id = $req->id_mentor;

        $mentor = Mentor::find(1);

        $mentor->student()->detach($user_id);

        $berhasil = array(
            'status' => 'berhasil'
        );

        Session::flash("berhasil_dikeluarkan", 'Murid berhasil dikeluarkan');

        return response()->json($berhasil);
    }
}
