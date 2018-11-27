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
Route::post('/profile', 'UserController@update');

Route::get('/profile/playlists', 'UserController@playlists')->name('profile.playlists');

Route::get('/profile/settings', 'UserController@settings')->name('profile.settings');

Route::get('/movie/{id}', 'MovieController@show')->name('movie.show');

Route::get('/playlists', 'PlaylistController@index')->name('playlist.index');

Route::get('/playlists/{id}', 'PlaylistController@show')->name('playlist.show');

