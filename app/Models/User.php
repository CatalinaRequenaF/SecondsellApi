<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Sanctum\PersonalAccessToken;

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
        'username',
        'email',
        'password',
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
    /*
    //Tiene N posts, comunidades y comentarios------------
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function communities()
    {
        return $this->hasMany(Community::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //Sigue X, le gusta X ------------
    public function follow()
    {
        return $this->hasMany(Follow::class, 'follow_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'likeable');
    }

    //Imágenes
    public function images()
    {
        return $this->hasMany(Image::class, 'imageable');
    }


    //Ver los seguidores-------------------
    public function follows(): MorphToMany
    {
        return $this->morphToMany(Follow::class, 'followable');
    }*/
}
