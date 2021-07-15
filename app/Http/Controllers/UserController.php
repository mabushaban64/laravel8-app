<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
       $search_input = request()->query('search_input',''); //input()
       $gender = request()->query('gender',''); //input()

        return view('pages.users.index')->with('search_input',$search_input)
                                        ->with('gender',$gender);
    }
    public function getUsers(){
        $users = User::where('is_admin',0)->get();

       /*  $search_input = request()->query('search_input',''); //input()
       $gender = request()->query('gender',''); //input() */

       /* $search_input = $_GET['search_input'];
       $gender = $_GET['gender']; */


        /* $users = User::when($search_input,function($query,$search_input){
                            return $query->where('fname','LIKE','%'.$search_input.'%');
                        })->when($search_input,function($query,$search_input){
                            return $query->where('lname','LIKE','%'.$search_input.'%');
                        })->when($search_input,function($query,$search_input){
                            return $query->where('email','LIKE','%'.$search_input.'%');
                        })->when($search_input,function($query,$search_input){
                            return $query->where('phone','LIKE','%'.$search_input.'%');
                        })->when($gender,function($query,$gender){
                            return $query->where('gender','LIKE','%'.$gender.'%');
                        })->get(); */

        //$users = User::where('fname','LIKE','%'.$search_input.'%')->get();
        //return response()->json(array('users'=>$users,'search_input'=>$search_input,'gender'=>$gender));
        //dd(request()->all());
        return response()->json($users);
    }

    public function store(Request $request)
    {
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
            $uploadFile = $request->file('avatar');
            $file_name = $uploadFile->hashName();
            $path = $uploadFile->storeAs('public/users', $file_name);
            $user->avatar = $file_name;

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
        $user = User::find($id);
        //dd($user);
        return response()->json($user);
    }

    public function roles($id)
    {
        $user = User::find($id);
         $all_id_roles_for_user = $user->roles->pluck('id');
         $roles =  Role::whereNotIn('id', $all_id_roles_for_user)->get();//Role::all();
         $granted_roles = $user->roles;
        return response()->json(['user'=>$user, 'roles'=>$roles->toArray(),'granted_roles'=>$granted_roles->toArray()]);
    }

    public function grantRole(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "role" => 'required'
        ]);

        if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->toArray()]);
        }

        $user = User::findOrFail($id);
        $role = $request->post('role'); // role[]

        $user->assignRole($role);

        return response()->json(['user'=>$user]);
    }

    public function revokeRole(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "role" => 'required'
        ]);

        if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->toArray()]);
        }

        $user = User::findOrFail($id);
        $role = $request->post('role'); // role[]

        foreach($role as $item){
            $user->removeRole($item);
        }

        return response()->json(['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
        //
     //   $this->authorize('edit-user',User::class);
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

        /* if ($request->hasFile('avatar')){
            $path = $request->file('avatar')->store('users', 'public');
            $user->avatar =  $path;
        } */
        if ($request->hasFile('avatar')){
            $uploadFile = $request->file('avatar');
            $file_name = $uploadFile->hashName();
            $path = $uploadFile->storeAs('public/users', $file_name);
            $user->avatar = $file_name;

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
      //  $this->authorize('delete-user',User::class);
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
       // $this->authorize('delete-all',User::class);
        $ids =$_POST['id'];
        if(!empty($ids)) {
            User::whereIn('id',$ids)->delete();
            $data['msg'] =  'success';
        }else {
            $data['msg'] = 'error';
        }
        return response()->json($data);
    }

    public function Excelexport()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function PDFexport()
    {
        return Excel::download(new UsersExport, 'users.pdf');

    }
}
