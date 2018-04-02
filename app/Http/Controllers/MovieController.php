<?php

namespace App\Http\Controllers;

use App\Movie;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Intervention\Image\Facades\Image;
use function MongoDB\BSON\toJSON;

class MovieController extends Controller {

    public function create(Request $request) {

        foreach( $request->photos as $photo){
                $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($photo, 0, strpos($photo, ';')))[1])[1];
                Image::make($photo)->save(public_path('images/') . $fileName);
            }
        $movie = new Movie($request->all());
        $movie->save();
        $movie->genres()->attach($request->genre);
        $movie->actors()->attach($request->cast);

    }

    public function update($id, Request $request) {

        //return $request;
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        $movie->genres()->sync($request->genre);
        $movie->actors()->sync($request->cast);

    }

    public function getMovie($id){
        $movie = Movie::findOrFail($id);
        return $movie->toJson(JSON_PRETTY_PRINT);

    }

    public function getCast($id){
        $cast = DB::table('actor_movie')->where('movie_id', $id)->get();
        return $cast->toJson(JSON_PRETTY_PRINT);
    }

    public function getGenres($id){
        $genres = Movie::findOrFail($id)->genres;
        return $genres;
    }
}
