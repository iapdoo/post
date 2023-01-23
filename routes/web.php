<?php

use App\Http\Controllers\Dashboard\CommentController;
use App\Http\Controllers\Dashboard\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'],function (){

    Route::resource('posts',PostController::class);
    Route::resource('comments',CommentController::class);
    Route::get('dashboard/comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');
    Route::get('dashboard/posts/{comment}',[PostController::class,'destroy'])->name('posts.destroy');
//    Route::put('dashboard/posts/{post}',[PostController::class,'update'])->name('posts.update');

});
