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

Route::get('/search', [App\Http\Controllers\PostController::class, 'search']);

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');

Route::post('/profile', [App\Http\Controllers\UserController::class, 'update_avatar']);

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post_index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/posts/show/{id?}', [App\Http\Controllers\PostController::class, 'show'])->name('post_show');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){

	Route::get('/posts/new', [App\Http\Controllers\PostController::class, 'create'])->name('post_create');

	Route::post('/posts/new', [App\Http\Controllers\PostController::class, 'store'])->name('post_store');

	Route::get('/posts/edit/{id?}', [App\Http\Controllers\PostController::class, 'edit'])->name('post_edit');
	Route::post('/posts/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post_update');

	Route::post('/posts/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post_destroy');


	Route::post('/comments/new', [App\Http\Controllers\CommentsController::class, 'store'])->name('comments_store');

	Route::post('/comments/update/{id}', [App\Http\Controllers\CommentsController::class, 'update'])->name('comments_update');

	Route::post('/comments/destroy/{id}', [App\Http\Controllers\CommentsController::class, 'destroy'])->name('comments_destroy');

});
