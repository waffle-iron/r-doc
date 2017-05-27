<?php

Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');

Route::get('/{vue?}', function () {
  return view('app');
})->where('vue', '[\/\w\.-]*')->name('home');
