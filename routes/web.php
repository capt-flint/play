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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->middleware('auth')->name('my-profile');
Route::get('/user/{user}', 'UserController@index')->name('user-profile');

Route::post('/user/add-friends', 'UserController@addFriend')->name('add-friend');

Route::post('/sendmessage', 'MessageController@sendMessage');
Route::get('/group/{id}', 'GroupController@show');
