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
Route::get('/user/detail/{id}', 'SportController@userDetail')->name('userDetail');
Route::get('/mypage/{id}', 'SportController@mypage')->name('mypage');

Route::resource('team', 'TeamController', ['only' => ['index', 'show']]);
Route::group(['prefix' => 'team'], function(){
    Route::post('/join', 'TeamController@joinTeam')->name('joinTeam');
    Route::post('/cancel/{id}', 'TeamController@cancelTeam')->name('cancelTeam');
    });

Route::resource('event', 'EventController', ['only' => ['index', 'show', 'create', 'store']]);
Route::group(['prefix' => 'event'], function(){
    Route::get('/genre/{id}', 'EventController@eventGenre')->name('eventGenre');
    Route::post('/join', 'EventController@joinEvent')->name('joinEvent');
    Route::post('/cancel/{id}', 'EventController@cancelEvent')->name('cancelEvent');
    });

Auth::routes();