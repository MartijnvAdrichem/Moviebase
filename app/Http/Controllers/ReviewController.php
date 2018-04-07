<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller {

    public function create(Request $request){
            $user =  Auth::user();
           $user->reviews()->create($request->all())->save();
    }
}
