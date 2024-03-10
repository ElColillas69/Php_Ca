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

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/blog/articles', [BlogArticlesController::class, 'index']);
Route::get('/blog/articles/{id}', [BlogArticlesController::class, 'show']);
Route::get('/blog/articles/create', [BlogArticlesController::class, 'create']);
Route::post('/blog/articles', [BlogArticlesController::class, 'store']);
Route::get('/blog/articles/{id}/edit', [BlogArticlesController::class, 'edit']);
Route::put('/blog/articles/{id}', [BlogArticlesController::class, 'update']);
Route::delete('/blog/articles/{id}', [BlogArticlesController::class, 'destroy']);

