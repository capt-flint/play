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

Route::get('login', 'LoginController@index')->name('login');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout')->name('logout');


Route::get('register', 'RegisterController@index')->name('register');
Route::post('register', 'RegisterController@register');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->middleware('auth')->name('my-profile');
Route::get('/user/{user}', 'UserController@index')->name('user-profile');

Route::post('/user/add-friends', 'UserController@addFriend')->name('add-friend');

Route::post('/sendmessage', 'MessageController@sendMessage');

Route::get('/groups', 'GroupController@index')->name('groups');

Route::post('/groups/update', 'GroupController@update')->name('groups-update');
Route::get('/groups/create', 'GroupController@create')->name('groups-create');
Route::post('/groups/create', 'GroupController@store')->name('groups-store');
Route::post('/groups/join', 'GroupController@joinGroup')->name('groups-join');

Route::get('/groups/{group}', 'GroupController@show')->name('group');
Route::get('/groups/{group}/edit', 'GroupController@edit')->name('groups-edit');

Route::post('/posts/create', 'PostController@store')->name('post-create');