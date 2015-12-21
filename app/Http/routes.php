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

// Homepage route
Route::get('/', [
    'uses' => 'HomeController@getHome',
    'as' => 'home',
]);

// Search route
Route::get('/search', [
  'uses' => 'SearchController@getResults',
  'as' => 'search',
]);

// Authentication and registration routes...
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');
});

Route::controllers([
   'password' => 'Auth\PasswordController',
]);

// Social login
Route::get('/auth/{provider}/', 'Auth\AuthController@redirectToProvider');

Route::get('/auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

// Video Resource route
Route::resource('videos', 'VideoController');

// Category resource Route
Route::resource('category', 'CategoryController');

/*
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
