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

Route::get('/', function () { return view('welcome'); });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mockups/guide', 'MockupsController@guide')->name('mockup-guide');
Route::get('/mockups/guide/intro/', 'MockupsController@edit')->name('mockup-guide-edit');
Route::get('/mockups/guide/steps/', 'MockupsController@editSteps')->name('mockup-guide-step-edit');
