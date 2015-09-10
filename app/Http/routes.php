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

Route::get('/', [
    'uses' => '\Tinder\Http\Controllers\HomeController@index',
    'as'   => 'home'
]);

/**
 *  Authentication routes
 */
Route::get('/signup', [
    'uses' => '\Tinder\Http\Controllers\AuthController@getSignUp',
    'as'   => 'auth.signup'
]);

Route::post('/signup', [
    'uses' => '\Tinder\Http\Controllers\AuthController@postSignUp'
]);

Route::get('/signin', [
    'uses' => '\Tinder\Http\Controllers\AuthController@getSignIn',
    'as'   => 'auth.signin'
]);

Route::post('/signin', [
    'uses' => '\Tinder\Http\Controllers\AuthController@postSignIn'
]);