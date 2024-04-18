<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

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

// Set up the default route to the login page
Route::view('/', 'auth.login')->name('login');



use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('/blog', PostsController::class);
Route::get('/blog/{postSlug}/article/{articleSlug}', 'PostsController@show');
Route::get('/blog/update/{id}', [PostController::class, 'edit']);

Route::put('/blog/update/{id}', [PostsController::class, 'update']);

Route::delete('/blog/update/{id}', [PostsController::class, 'destroy']);



Route::get('/blog', [PostsController::class, 'index'])->name('blog.index');


Route::get('/blog/search', [PostsController::class, 'search'])->name('blog.search');

Route::post('/like/{post}', [PostsController::class, 'likePost'])->name('like.post');


// Laravel default authentication routes
Auth::routes();