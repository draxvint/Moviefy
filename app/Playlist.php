<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function movies()
    {
        return $this->belongsToMany('App\Movie');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function subscribedUsers()
    {
        return $this->belongsToMany('App\User');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
