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
Route::get('/event/index', 'SportController@eventIndex')->name('eventIndex');
Route::get('/team/detail/{id}', 'SportController@teamDetail')->name('teamDetail');
Route::get('/team/index', 'SportController@teamIndex')->name('teamIndex');
Route::get('/user/detail/{id}', 'SportController@userDetail')->name('userDetail');
Route::get('/mypage/{id}', 'SportController@mypage')->name('mypage');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
