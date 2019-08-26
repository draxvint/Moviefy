<?php

namespace Moviefy;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'release_date'];



    public function playlists()
    {
        return $this->belongsToMany('Moviefy\Playlist');
    }

    public function comments()
    {
        return $this->hasMany('Moviefy\Comment');
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getDescriptionAttribute($value){
        return $value;
    }

    public function getTrailerUrlAttribute($value){
        return $value;
    }

    public function getCountryAttribute($value){
        return $value;
    }

    public function getLengthAttribute($value){
        return $value;
    }

    public function getReleaseDateAttribute($value){
        return $value;
    }

}
