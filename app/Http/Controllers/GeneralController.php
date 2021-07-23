<?php

namespace App\Http\Controllers;

use App\Models\someData;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //
    public function index(){
        /* $users= User::where('is_admin',0)->get(); */
        return view('pages.general.index')/* ->with('users',$users) */;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'datetime' => 'required',
            'time' => 'required',
            'daterange' => 'required',
            'slider' => 'required',
            'color' => 'required',
            'content' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->all()]);
        }

        $data = new someData();
        $data->date = date('Y-m-d', strtotime($request->input('date')));
        $data->date_time = date('Y-m-d H:i:s', strtotime($request->input('datetime')));
        //$data->date_time = $request->input('date_time');
        $data->time = $request->input('time');
        $data->daterange = $request->input('daterange');
        $data->slider = $request->input('slider');
        $data->color = $request->input('color');
        $data->user_id = $request->email;
        $data->content = $request->content;
        $data->save();

       return response()->json($data);
        //return redirect()->route('dropzone');
    }

    public function getdataforselect2(Request $request){

        /* structure of select2
        {
            "results": [
              {
                "id": 1,
                "text": "Option 1"
              },
              {
                "id": 2,
                "text": "Option 2"
              }
            ],
            "pagination": {
              "more": true
            }
          } */

        if ($request->ajax()) {

            $term = trim($request->term);
            $users = User::select('id','email as text')
                        ->where('is_admin',0)
                        ->where('email', 'LIKE',  '%' . $term. '%')
                        ->orderBy('email', 'asc')->simplePaginate(5);

            $morePages=true;
          // $pagination_obj= json_encode($users);
           if (empty($users->nextPageUrl())){ $morePages=false; }
            $results = array(
              "results" => $users->items(),
              "pagination" => array("more" => $morePages)
            );
            return response()->json($results);
        }
    }
}
