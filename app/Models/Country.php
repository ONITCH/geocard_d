<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    public function cards()
    {
        return $this->belongsToMany(Card::class, 'card_countries');
    }

    public function scopeAllCountries($query)
    {
        return $query->orderBy('name', 'asc')->get();
    }
}
