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


Auth::routes();

Route::get('/', 'MovieController@index')->name('home');

Route::get('/profile', 'UserController@index')->name('profile');

Route::get('/profile/settings', 'UserController@settings')->name('profile.settings');

Route::get('/movie/{id}', 'MovieController@show')->name('movie.show');
