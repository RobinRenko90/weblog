<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeblogController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('weblogs', WeblogController::class);
Route::post('weblogs/{weblog}/comment', [CommentController::class, 'store'])->name('comment.store');