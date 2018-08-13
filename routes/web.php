<?php

Route::get('/', 'ApplicationController@index');

/**
 * Frontend Routes
 */
Route::post('/trip', 'TripController@setup');
Route::get('/trip', 'TripController@plan');

Route::get('/list', function () {
    $json = \Illuminate\Support\Facades\Storage::disk('local')->read('public/world-cities_json.json');
    return $json;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
