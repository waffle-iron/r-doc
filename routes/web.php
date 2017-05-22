<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::group(['prefix' => 'mockups'], function () {
  Route::get('guide/{guideid}', 'MockupsController@guide')->name('mockup-guide');
  Route::get('guide/intro/{guideid}', 'MockupsController@edit')->name('mockup-guide-intro-edit');
  Route::get('guide/steps/{guideid}/{stepid}', 'MockupsController@editSteps')->name('mockup-guide-step-edit');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

