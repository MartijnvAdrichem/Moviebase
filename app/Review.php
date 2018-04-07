<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

    protected $fillable = ['title', 'rating', 'content', 'user_id', 'movie_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
