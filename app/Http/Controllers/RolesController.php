<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function index()
    {

        $roles = Role::latest()->get();
        return view('pages.roles.index')->with('roles',$roles);
    }

    public function getRoles(){
        $role = Role::where('name','!=','super-admin')->get();
        return response()->json($role);
    }


    public function permissions($id)
    {
        $role = Role::find($id);
        $all_id_permissions_for_role = $role->permissions->pluck('id');
        $permissions =  Permission::whereNotIn('id', $all_id_permissions_for_role)->get();//Role::all();
        $granted_permissions = $role->permissions;
        return response()->json(['role'=>$role, 'permissions'=>$permissions->toArray(),'granted_permissions'=>$granted_permissions->toArray()]);
    }

    public function grantPerm(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "permission" => 'required'
        ]);

        if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->toArray()]);
        }

        $role = Role::findOrFail($id);
        $permissions = $request->post('permission'); // permission[]

        $role->givePermissionTo($permissions);

        return response()->json();
    }

    public function revokePerm(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "permission" => 'required'
        ]);

        if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->toArray()]);
        }

        $role = Role::findOrFail($id);
        $permissions = $request->post('permission'); // permission[]


        foreach($permissions as $item){
            $role->revokePermissionTo($item);
        }

        return response()->json();
    }
}
