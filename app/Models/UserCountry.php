<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCountry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function scopeSelectedCountries($query, $userId)
    {
        return $query->where('user_id', $userId)->with('country')->get();
    }
}
