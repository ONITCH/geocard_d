<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadImage extends Model
{
    use HasFactory;

    protected $table = 'templates';

    protected $fillable = [
        'filename',
        'file_path',
        'box_shadow',
        'CSS1',
        'CSS2',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id');
    }

    public function css1()
    {
        return $this->hasManyThrough(Css::class, UploadImage::class, 'template_id', 'id', 'id', 'css1');
    }

    public function css2()
    {
        return $this->hasManyThrough(Css::class, UploadImage::class, 'template_id', 'id', 'id', 'css2');
    }
}
