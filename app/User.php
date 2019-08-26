<?php

namespace Moviefy;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function playlists()
    {
        return $this->hasMany('Moviefy\Playlist');
    }


    public function subscribedPlaylists()
    {
        return $this->belongsToMany('Moviefy\Playlist','playlist_user','user_id');
    }

    public function comments()
    {
        return $this->hasMany('Moviefy\Comment');
    }
}
