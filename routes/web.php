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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->middleware('auth')->name('my-profile');
Route::get('/user/{user}', 'UserController@index')->name('user-profile');

Route::post('/user/add-friends', 'UserController@addFriend')->name('add-friend');

Route::post('/sendmessage', 'MessageController@sendMessage');

Route::get('/group/{id}', 'GroupController@show')->name('group');
Route::get('/group/{id}/edit', 'GroupController@edit')->name('group-edit');
Route::get('/groups', 'GroupController@index')->name('groups');

Route::post('/group/update', 'GroupController@update')->name('group-update');
Route::post('/group/join', 'GroupController@joinGroup')->name('join-group');
