<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MicroBlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/users/login', [UserController::class, 'login'])->name('users.login');
Route::post('/users/login', [UserController::class, 'storeLogin'])->name('users.storeLogin');
Route::delete('/users/logout', [UserController::class, 'logout'])->name('users.logout');
Route::post('/users/{user}/follow', [UserController::class, 'follow'])->name('users.follow');
Route::delete('/users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow');
Route::get('/users/{user}/followers', [UserController::class, 'followers'])->name('users.followers');
Route::get('/users/{user}/followees', [UserController::class, 'followees'])->name('users.followees');
Route::resource('/users', UserController::class);

Route::get('/micro-blogs/user/{user}', [MicroBlogController::class, 'userIndex'])->name('micro-blogs.userIndex');
Route::resource('/micro-blogs', MicroBlogController::class)->parameters([
  'micro-blogs' => 'microBlog'
]);
