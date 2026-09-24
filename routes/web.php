<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WeblogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login_authentication');
Route::post('/logout', [LogoutController::class, 'handle'])->name('logout');

route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('weblogs', WeblogController::class);
    Route::resource('categories', CategoryController::class);
    Route::post('weblogs/{weblog}/comment', [CommentController::class, 'store'])->name('comment.store');
});