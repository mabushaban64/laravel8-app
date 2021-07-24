<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    //
    public function index() {
        return view('pages.settings.index')->with('Settings',Settings::first());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'color' => 'required',
        ]);

        if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->all()]);
        }

        $Setting = Settings::first();
        $Setting->color = $request->input('color');
        $Setting->font = $request->font;
        $Setting->save();

       return response()->json($Setting);
    }
}
