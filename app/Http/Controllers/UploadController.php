<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadImage;

class UploadController extends Controller
{
    function show()
    {
        $uploads = UploadImage::orderBy("id", "desc")->get();

        return view("card/upload", [
            "images" => $uploads,
        ]);
    }

    function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|file|image|mimes:png,jpeg'
        ]);
        $upload_image = $request->file('image');

        if ($upload_image) {
            //アップロードされた画像を保存する
            $path = $upload_image->store('uploads', "public");
            //画像の保存に成功したらDBに記録する
            if ($path) {
                UploadImage::create([
                    "filename" => $upload_image->getClientOriginalName(),
                    "file_path" => $path,
                    // 'template_id'=>
                    "paid" => $request->paid,
                    "box_shadow" => $request->box_shadow,
                    "CSS1" => $request->CSS1,
                    "CSS2" => $request->CSS2
                ]);
            }
        }

        $uploads = UploadImage::orderBy("id", "desc")->get();

        return redirect("/card/upload");
    }
}
