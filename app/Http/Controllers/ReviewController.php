<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Review;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller {

    public function create(ReviewRequest $request){
            $user =  Auth::user();

            $exists = DB::table('reviews')
                ->whereUserId($user->id)
                ->whereMovieId($request->movie_id)
                ->count() > 0;

            if(!$exists) {
                $user->reviews()->create($request->all())->save();
            } else {
                return response([
                    'status' => 'error',
                    'error' => 'notaccepted.error',
                    'message' => 'You can only have 1 review per movie'
                ], 500);

            }

    }
}
