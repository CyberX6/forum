<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/{provider}/auth', 'SocialsController@auth')->name('social.auth');
Route::get('/{provider}/redirect', 'SocialsController@callback')->name('social.callback');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('channels', 'ChannelsController');
});