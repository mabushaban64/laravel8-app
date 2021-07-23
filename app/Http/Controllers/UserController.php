<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
//use App\Traits\MetronicPaginate;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   // use MetronicPaginate;

    public function index()
    {
        if (request()->expectsJson()) {

            // $user = User::where('is_admin',0)
            // $users = User::where('is_admin',0)->scopeMetronicPaginate($user);
            $users = User::where('is_admin',0)->metronicPaginate();
              return response()->json($users);

        }
        return view('pages.users.index');
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

    public function fileImportExport()
    {
       return view('pages.import.index');
    }

    public function fileImport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required',
        ]);

        if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->all()]);
        }

        /* $UsersImport = new UsersImport();
        $UsersImport->import($request->file('file')); */

        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return response()->json();
    }

}
