<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller {

    public function create(Request $request){

        $movie = new Actor($request->all());
        $movie->save();
    }

}
