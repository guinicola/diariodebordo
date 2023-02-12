<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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


## home
Route::get ('/home',[HomeController::class, 'index']);
Route::get ('/',[HomeController::class, 'index']);

## posts
Route::resource ('/posts',PostsController::class);
Route::get ('/posts/print/{id}',[PostsController::class, 'print']);
Route::get ('/posts/{post}/duplicate',[PostsController::class, 'duplicate']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
