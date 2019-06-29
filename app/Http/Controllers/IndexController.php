<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use Validator;
use Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Mentor;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function addItem(Request $request)
    {
        $rules = array(
            'name' => 'required|alpha_num',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(

                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new Data();
            $data->name = $request->name;
            $data->save();

            return response()->json($data);
        }
    }
    public function readItems(Request $req)
    {
        $data = Data::all();
        $mentor_id = Auth::guard('mentor')->user()->id;

        $student = Mentor::find($mentor_id);
        return view('mentor.pages.student.index', ['data' => $data, 'student' => $student]);
    }
    public function editItem(Request $req)
    {
        $data = Data::find($req->id);
        $data->name = $req->name;
        $data->save();

        return response()->json($data);
    }
    public function deleteItem(Request $req)
    {
        Data::find($req->id)->delete();

        return response()->json();
    }
}
