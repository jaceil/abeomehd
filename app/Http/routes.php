<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/', function () {
    return view('pages.home');
});

Route::get('home', function () {
    return view('pages.home');
});

Route::get('about', function() {
    return view('pages.about');
});

Route::resource('projects', 'ProjectController');
Route::resource('mice', 'MouseController');
Route::get('mice/create/{id}', ['uses' => 'MouseController@create']);
Route::resource('plates', 'PlatesController');
Route::get('plates/create/{id}', ['uses' => 'PlatesController@create']);
Route::post('plates/{plates}/plate-photos', 'PlatesController@addPhoto');
Route::post('hits', 'PlatesController@storehits');
//Route::get('projects/{name}', 'ProjectController@show');

