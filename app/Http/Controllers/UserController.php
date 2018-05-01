<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {


    public function AddMovieWatchlist($id){
        $user = Auth::user();
        $user->movies()->attach($id);
    }

    public function RemoveMovieWatchlist($id){
        $user = Auth::user();
        $user->movies()->detach($id);
    }

    public function getWatchlist(){
        $user = Auth::user();
        return $user->movies;
    }





}
