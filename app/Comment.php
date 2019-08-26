<?php

namespace Moviefy;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function getIdAttribute($value){
        return ucfirst($value);
    }


    public function getDateAttribute($value){
        return ucfirst($value);
    }
    public function setDateAttribute($value) {
        $this->attributes['date'] = strtolower($value);
    }


    public function getContentAttribute($value){
        return ucfirst($value);
    }
    public function setContentAttribute($value) {
        $this->attributes['content'] = strtolower($value);
    }

    public function user()
    {
        return $this->belongsTo('Moviefy\User', 'user_id');
    }
    public function movie()
    {
        return $this->belongsTo('Moviefy\Movie','movie_id');
    }
}
