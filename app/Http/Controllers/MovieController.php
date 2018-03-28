<?php

namespace App\Http\Controllers;

use App\Movie;
use App\User;
use Illuminate\Http\Request;

class MovieController extends Controller {

    public function create(Request $request){

         $movie = new Movie($request->all());
         $movie->save();
         $movie->genres()->attach($request->genre);
    }
}