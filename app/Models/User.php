<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'file_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function followings()
    {
        return $this->belongsToMany(self::class, "follows", "user_id", "following_id")->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, "follows", "following_id", "user_id")->withTimestamps();
    }

    public function canFollow(User $user)
    {
        if (!$this->id || $user->id === $this->id) {
            return false;
        }

        return !$this->followings()->where('user_id', $user->id)->exists();
    }

    public function isFollowing(User $user)
    {
        return $this->followings->contains($user);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function show(User $user)
    {
        $followers = $user->followers;
        return view('user.show', compact('user', 'followers'));
    }
}
