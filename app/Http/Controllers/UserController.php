<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\userInfo;
use DataTables;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $this->authorize('all-users',User::class);
        $users = User::all();
        return view('pages.users.index');
    }
    public function getUsers(){
        $this->authorize('all-users',User::class);
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $this->authorize('add-user',User::class);
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'birthday' => 'required|date',
            'gender' => 'required',
            'streetAddress' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->all()]);
        }

        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);

        $user = new User();
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($password);

        if ($request->hasFile('avatar')){
            $path = $request->file('avatar')->store('users', 'public');
            $user->avatar =  $path;
           }

        $user->birthday =$request->input('birthday');
        $user->gender = $request->input('gender');

        $user->street_address = $request->input('streetAddress');
        $user->postal_code = $request->input('postcode');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');

        $user->save();

        return response()->json();
    }
    

    public function edit($id)
    {
        //
        $this->authorize('edit-user',User::class);
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        //
        $this->authorize('edit-user',User::class);
        $user  =  User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'unique:users,email,'.$user->id,
            'phone' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'birthday' => 'required|date',
            'gender' => 'required',
            'streetAddress' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->all()]);
        }


        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        if ($request->hasFile('avatar')){
            $path = $request->file('avatar')->store('users', 'public');
            $user->avatar =  $path;
        }

        $user->birthday =$request->input('birthday');
        $user->gender = $request->input('gender');

        $user->street_address = $request->input('streetAddress');
        $user->postal_code = $request->input('postcode');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');

        $user->save();

        return response()->json($user);
    }

    public function destroy($id)
    {
        $this->authorize('delete-user',User::class);
        $user  =  User::findOrFail($id);
        $user_name = $user->fname.' '.$user->fname;
        if(!empty($user)) {
            $user->delete();
            $data['msg'] =  'success';
            $data['user_name'] = $user_name;
        }else {
            $data['msg'] = 'error';
        }
        return response()->json($data);
    }

    public function deleteall(Request $request)
    {
        $this->authorize('delete-all',User::class);
        $ids =$_POST['id'];
        if(!empty($ids)) {
            User::whereIn('id',$ids)->delete();
            $data['msg'] =  'success';
        }else {
            $data['msg'] = 'error';
        }
        return response()->json($data);
    }
}
