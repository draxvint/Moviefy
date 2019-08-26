<?php

namespace Moviefy;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function movies()
    {
        return $this->belongsToMany('Moviefy\Movie');
    }

    public function user()
    {
        return $this->belongsTo('Moviefy\User');
    }

    public function subscribedUsers()
    {
        return $this->belongsToMany('Moviefy\User');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }


}
