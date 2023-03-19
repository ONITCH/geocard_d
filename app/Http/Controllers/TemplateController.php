<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadImage;

class TemplateController extends Controller
{
    function show()
    {
        //アップロードした画像を取得
        $uploads = UploadImage::orderBy("id", "desc")->get();

        return view("card/upload", [
            "images" => $uploads
        ]);
    }

    // function show2()
    // {
    //     //アップロードした画像を取得
    //     $uploads = UploadImage::orderBy("id", "desc")->get();

    //     return view("card/create", [
    //         "images" => $uploads
    //     ]);
    // }
}
