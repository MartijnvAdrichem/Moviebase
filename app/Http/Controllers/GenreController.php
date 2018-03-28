<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller {


    public function getGenres(){
        return Genre::all();
    }
}
