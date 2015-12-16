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
    'uses' => 'HomeController@getHome',
    'as'   => 'home',
]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);

// Social login
Route::get('/auth/{provider}/', 'Auth\AuthController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::resource('videos', 'VideoController');

Route::resource('category', 'CategoryController');

/**
 * User profile
 */
Route::get('/user/profile/edit', [
    'uses' => 'UserProfileController@getEdit',
    'as' => 'userProfileEdit',
    'middleware' => 'auth',
]);
Route::post('/user/profile/edit', [
    'uses' => 'UserProfileController@postEdit',
    'middleware' => 'auth',
]);
Route::get('/user/{id}', [
    'uses' => 'UserProfileController@getProfile',
    'as' => 'userProfile',
    'middleware' => 'auth',
]);
