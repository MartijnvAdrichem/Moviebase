<?php

namespace App\Http\Controllers;

use App\Actor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class ActorController extends Controller {

    public function create(Request $request){

        $actor = new Actor($request->all());
        $photo = $request->profilephoto;
        if($photo) {
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($photo, 0, strpos($photo, ';')))[1])[1];
            $actor->profilephoto = $fileName;
            Image::make($photo)->save(public_path('images/') . $fileName);
        }

        $actor->save();
    }

    public function update($id, Request $request) {

        $actor = Actor::findOrFail($id);
        if ($request->profilephoto){
            $photo = $request->profilephoto;
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($photo, 0, strpos($photo, ';')))[1])[1];
            $actor->profilephoto = $fileName;
            Image::make($photo)->save(public_path('images/') . $fileName);
        }

        $actor->update($request->all());
    }

    public function getActors(){
        return Actor::orderBy('firstname', 'ASC')->orderBy('lastname', 'ASC')->get();
    }

    public function getActor($id){
//        $movie = Movie::where('id', $id)->with('reviews')->first();
        $actor = Actor::with(['movies', 'photos'])->findOrFail($id);
        return $actor;

    }


    public function getRandomActors($amount){
        $actors = Actor::inRandomOrder()->take($amount)->get();
        return $actors;

    }
}
