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
    'as'   => 'auth.signup',
    'middleware' => ['guest']
]);

Route::post('/signup', [
    'uses' => '\Tinder\Http\Controllers\AuthController@postSignUp',
    'middleware' => ['guest']
]);

Route::get('/signin', [
    'uses' => '\Tinder\Http\Controllers\AuthController@getSignIn',
    'as'   => 'auth.signin',
    'middleware' => ['guest']
]);

Route::post('/signin', [
    'uses' => '\Tinder\Http\Controllers\AuthController@postSignIn',
    'middleware' => ['guest']
]);

Route::get('/signout', [
    'uses' => '\Tinder\Http\Controllers\AuthController@getSignOut',
    'as'   => 'auth.signout'
]);

/**
 *  Search Routes
 */
Route::get('/search', [
    'uses' => '\Tinder\Http\Controllers\SearchController@getResults',
    'as'   => 'search.results'
]);

/**
 *  Profile routes
 */
Route::get('user/{username}', [
    'uses' => '\Tinder\Http\Controllers\ProfileController@getProfile',
    'as'   => 'profile.index'
]);