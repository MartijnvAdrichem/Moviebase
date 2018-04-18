<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model {
    
    protected $fillable = [
                "firstname",
                "prefix",
				"lastname",
				"biography",
				"birthday",
        ];

    public function movies(){
        return $this->belongsToMany('App\Movie')->withPivot('role');
    }

    public function photos(){

        return $this->morphMany('App\Photo', 'imageable');
    }

}
