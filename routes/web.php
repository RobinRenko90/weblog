<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeblogController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('weblogs', WeblogController::class);