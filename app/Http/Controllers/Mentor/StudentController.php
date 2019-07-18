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

        $student = Mentor::find($mentor_id)->student;

        $js = Mentors_student::where("id_mentor", $mentor_id)->get()->count();

        $tanggal_follow = Mentors_student::where("id_mentor", $mentor_id)->get();

        return view('mentor.pages.student.index', compact('student', "js", "tanggal_follow"));
    }

    public function getDataStudent()
    {
        $mentor_id = Auth::guard('mentor')->user()->id_student;


        // return Datatables::of(Mentor::all()->where('mentor_id', $mentor_id)->student)->make(true);
    }

    public function unfollow($id)
    {
        $std = Mentors_student::where("id_mentor",Auth::guard('mentor')->user()->id_mentor)->where("id_student", $id)->get();

        $std2 = Mentors_student::find($std[0]["kode_mengikuti"]);

        $std2->delete();

        Session::flash("berhasil_unfollow", "berhasil");

        return back();

    }

    public function update_kuota(Request $request){
        $kuota = $request->kuota;
        
        $mentor = Mentor::find(Auth::guard('mentor')->user()->id_mentor);

        $js = Mentor::where("id_mentor", Auth::guard('mentor')->user()->id_mentor)->get();

        if($kuota < count($js)){
            Session::flash("gagal_update_kuota", "gagal");
    
            return back();
        }else{
            $mentor->kuota = $kuota;
    
            $mentor->update();
    
            Session::flash("berhasil_update_kuota", "berhasil");
    
            return back();
        }

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
