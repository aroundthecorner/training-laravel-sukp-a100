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

// Route::get('users','UsersController@index');

Route::resource('users', 'UsersController');

Route::resource('tasks', 'TasksController');

// 1. Set route name / url
// 2. Set target controller@method being use for this route
Route::get('profile', 'ProfileController@index');

Route::get('contact', 'PagesController@contact');

Route::get('about', 'PagesController@about');





























/* 3 ways to generate a page */

Route::get('penang', function() {
    return 'komtar';
});

Route::get('komtar', function() {
    return view('dashboards.profile');
});

Route::get('komtarctrl', 'HomeController@komtar');





Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
















