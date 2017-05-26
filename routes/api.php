<?php

use App\Http\Controllers\GuideController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {

  Route::get('/guides', 'GuideController@index');
  Route::get('/guides/search', 'GuideController@search');
  Route::get('/guides/{guide}', 'GuideController@show');

  Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('guides', 'GuideController', ['except' => ['show', 'index']]);
  });
});
