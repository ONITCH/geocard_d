<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $table = 'templates';

    protected $fillable = [
        'filename',
        'file_path',
    ];

    public function upload_images()
    {
        return $this->hasMany(UploadImage::class, 'template_id');
    }
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Template extends Model
// {
//     // protected $table = 'templates';

//     // protected $fillable = ["card_avatar", "file_path", "comments"];

//     public function template()
//     {
//         return $this->belongsTo(Template::class);
//     }
// }
