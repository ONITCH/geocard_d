<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadImage;

class TemplateController extends Controller
{
    function show()
    {

        //アップロードした画像を取得して表示するためのコントローラ！！！多分！
        $uploads = UploadImage::orderBy("id", "desc")->get();

        return view("card/upload", [
            "images" => $uploads
        ]);
    }
}
