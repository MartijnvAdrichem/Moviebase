<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

    protected $fillable = ['title', 'description', 'runTime', 'releaseDate', 'storyLine'];


    public function genres(){
        return $this->belongsToMany('App\Genre');
    }
}
