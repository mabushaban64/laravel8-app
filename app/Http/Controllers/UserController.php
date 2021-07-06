<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">View</a>';
                        return $btn;
                    })
                   // ->rawColumns(['action'])
                    ->make(true);
        }

        return view('pages.users');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
        $user = User::find($id);
        return response()->json($user);
    }

    public function edit($id)
    {
        //
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
        ]);

        if (!$validator->passes()) {
			return response()->json(['error'=>$validator->errors()->all()]);
        }

        $user  =  User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        //return response()->json(array('user-ajax'=>$user));
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user  =  User::findOrFail($id);
        $user_name = $user->name;
        if(!empty($user)) {
            $user->delete();
            $data['msg'] =  'success';
            $data['user-name'] = $user_name;
        }else {
            $data['msg'] = 'error';
        }
        return response()->json($data);
    }
}
