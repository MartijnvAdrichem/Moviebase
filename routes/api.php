<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'jwt.auth'], function(){
    Route::get('auth/user', 'AuthController@user');
    Route::post('review/create', 'ReviewController@create');
    Route::get('movie/{id}/watchlist', 'MovieController@isOnWatchlist');
    Route::post('user/watchlist/add/{id}', 'UserController@AddMovieWatchlist');
    Route::post('user/watchlist/remove/{id}', 'UserController@RemoveMovieWatchlist');
    Route::get('user/watchlist', 'UserController@getWatchlist');
});

Route::group(['middleware' => 'jwt.refresh'], function(){
    Route::get('auth/refresh', 'AuthController@refresh');
    Route::post('auth/logout', 'AuthController@logout');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('auth/register', 'AuthController@register');

Route::post('auth/login', 'AuthController@login');

Route::post('movie/create', 'MovieController@create');
Route::get('movie/{id}', 'MovieController@getMovie');
Route::get('movies/all', 'MovieController@allMovies');
Route::put('movie/edit/{id}', 'MovieController@update');
Route::get('movie/{id}/cast', 'MovieController@getCast');
Route::get('movie/{id}/genres', 'MovieController@getGenres');
Route::get('movie/{id}/photos', 'MovieController@getPhotos');
Route::get('movie/random/{amount}', 'MovieController@getRandomMovies');



Route::post('actor/create', 'ActorController@create');
Route::get('actor/all', 'ActorController@getActors');
Route::get('actor/{id}', 'ActorController@getActor');
Route::get('actor/random/{amount}', 'ActorController@getRandomActors');
Route::put('actor/edit/{id}', 'ActorController@update');

Route::get('genre/all', 'GenreController@getGenres');


