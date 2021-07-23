<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ImagesUpload;

class DropzoneController extends Controller
{
    //
    public function index(){
        return view('pages.dropzone.index');
    }

    public function store(Request $request)
    {
        /* $validator = Validator::make($request->all(), [
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->all()]);
        } */

    if ($request->hasFile('file')){
        $uploadFile = $request->file('file');
        $file_name = $uploadFile->hashName();
        $path = $uploadFile->storeAs('public/dropzone', $file_name);
        $images = new ImagesUpload();
        $images->img = $file_name;
        $images->save();
       }

       $data = $images->id;
       return response()->json($data);
        //return redirect()->route('dropzone');
    }

    public function destroy($id)
    {
        $image  =  ImagesUpload::findOrFail($id);
        if(!empty($image)) {
            unlink(public_path().$image->img); //img is accessor
            $image->delete();
            $data['msg'] =  'success';
        }else {
            $data['msg'] = 'error';
        }
        return response()->json($data);
    }

    public function get($id)
    {
        return $image  =  ImagesUpload::findOrFail($id);
    }
}
