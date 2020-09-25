<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('users', 'UsersController');

Route::resource('microBlogs', 'MicroBlogsController');

Route::get('users/{user}/followers', 'UsersController@followers')->name('users.followers');
Route::get('users/{user}/followings', 'UsersController@followings')->name('users.followings');

Route::resource('followers', 'FollowersController')->only(['store', 'destroy']);
