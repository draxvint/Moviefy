<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
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


	public function getNationalityAttribute($value){
        return ucfirst($value);
    }
    public function setNationalityAttribute($value) {
        $this->attributes['nationality'] = strtolower($value);
    }


    public function getDateOfBirthAttribute($value){
        return ucfirst($value);
    }
    public function setDateOfBirthAttribute($value) {
        $this->attributes['date_of_birth'] = strtolower($value);
    }


	public function getPlaceOfBirthAttribute($value){
        return ucfirst($value);
    }
    public function setPlaceOfBirthAttribute($value) {
        $this->attributes['place_of_birth'] = strtolower($value);
    }


    public function getDescriptionAttribute($value){
        return ucfirst($value);
    }
    public function setDescriptionAttribute($value) {
        $this->attributes['description'] = strtolower($value);
    }


    public function movies()
    {
        return $this->belongsToMany('App\Movie');
    }
}


