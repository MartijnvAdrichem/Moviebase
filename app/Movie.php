<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

    protected $fillable = ['title', 'description', 'runTime', 'releaseDate', 'storyLine', 'video', 'mainphoto'];


    public function genres(){
        return $this->belongsToMany('App\Genre');
    }

    public function actors(){
        return $this->belongsToMany('App\Actor');
    }

    public function photos(){

        return $this->morphMany('App\Photo', 'imageable');
    }

    public function reviews(){
        return $this->hasMany('App\Review')->with('user');
    }
}
