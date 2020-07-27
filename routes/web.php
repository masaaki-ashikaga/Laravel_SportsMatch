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

Route::get('/', 'SportController@index')->name('home');
Route::get('/genre', 'SportController@genre')->name('genre');
Route::get('/event/genre/{id}', 'SportController@eventGenre')->name('eventGenre');
Route::get('/event/detail/{id}', 'SportController@eventDetail')->name('eventDetail');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
