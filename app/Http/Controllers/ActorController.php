<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller {

    public function create(Request $request){

        $actor = new Actor($request->all());
        $actor->save();
    }

    public function getActors(){
        return Actor::orderBy('firstname', 'ASC')->orderBy('lastname', 'ASC')->get();
    }
}
