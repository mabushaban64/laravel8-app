<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ImagesUpload extends Model
{
    use HasFactory;

    public function getImgAttribute($image){

        $img = Storage::url('public/dropzone/'.$image.'');
        return $img;
    }
}
