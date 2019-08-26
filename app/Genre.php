<?php

namespace Moviefy;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function getIdAttribute($value){
        return ucfirst($value);
    }


    public function getNameAttribute($value){
        return ucfirst($value);
    }
    public function setNameAttribute($value) {
        $this->attributes['name'] = strtolower($value);
    }

    public function movie()
    {
        return $this->hasMany('Moviefy\Movie','movie_id');
    }
}
