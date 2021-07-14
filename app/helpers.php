<?php
use Illuminate\Support\Facades\Storage;

function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}

function userImagePath($image_name){
    //return public_path('images/users/'.$image_name);
    if($image_name){
        $image = Storage::url('public/users/'.$image_name.'');
        return $image;
    }else{
        $image = Storage::url('public/default/default.jpg');
        return $image;
    }
}

