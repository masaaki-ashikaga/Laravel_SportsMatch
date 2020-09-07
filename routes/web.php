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

Route::get('/home', 'SportController@index')->name('home');
Route::get('/genre', 'SportController@genre')->name('genre');
Route::get('/user/detail/{id}', 'SportController@userDetail')->name('userDetail');
Route::get('/mypage/{id}', 'SportController@mypage')->name('mypage');
Route::get('mypage/edit/{id}', 'SportController@profileEdit')->name('profileEdit');
Route::post('mypage/update', 'SportController@profileUpdate')->name('profileUpdate');
Route::get('/event/manage', 'EventController@eventManage')->name('eventManage');
Route::get('/team/manage', 'TeamController@teamManage')->name('teamManage');


Route::resource('team', 'TeamController');
Route::group(['prefix' => 'team'], function(){
    Route::post('/join', 'TeamController@joinTeam')->name('joinTeam');
    Route::post('/cancel/{id}', 'TeamController@cancelTeam')->name('cancelTeam');
    Route::post('/find', 'TeamController@findTeam')->name('findTeam');
});

Route::resource('event', 'EventController');

Route::group(['prefix' => 'event'], function(){
    Route::get('/genre/{id}', 'EventController@eventGenre')->name('eventGenre');
    Route::get('/public/{id}', 'EventController@eventPublic')->name('eventPublic');
    Route::post('/join', 'EventController@joinEvent')->name('joinEvent');
    Route::post('/cancel/{id}', 'EventController@cancelEvent')->name('cancelEvent');
    Route::post('/find', 'EventController@findEvent')->name('findEvent');
});


Auth::routes();