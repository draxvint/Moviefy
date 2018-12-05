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

Route::get('/profile/settings', 'UserController@settings')->name('profile.settings');

Route::get('/profile/playlist', 'UserController@playlists')->name('profile.playlists');

Route::get('/profile/playlist/create', 'PlaylistController@create')->name('playlist.create');

Route::post('/profile/playlist/create', 'PlaylistController@store')->name('playlist.store');

Route::get('/movie/search', 'MovieController@search')->name('movie.search');

Route::get('/movie/{id}', 'MovieController@show')->name('movie.show');

Route::get('/playlists', 'PlaylistController@index')->name('playlist.index');

Route::post('/playlist/add', 'PlaylistController@addMovie')->name('playlist.addMovie');

Route::post('/playlist/remove-movie', 'PlaylistController@removeMovie')->name('playlist.remove-movie');

Route::post('/playlist/delete', 'PlaylistController@delete')->name('playlist.delete');

Route::get('/playlist/{id}', 'PlaylistController@show')->name('playlist.show');

Route::get('/genre/{id}', 'MovieController@showGenre')->name('genre.show');

