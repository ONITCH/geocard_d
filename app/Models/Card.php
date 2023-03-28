<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Template;


class Card extends Model
{
    use HasFactory;

    // protected $table = "cards";
    protected $fillable = ["card_avatar", "file_path", "comments", "template_id", "residence"];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'card_countries');
    }
}
