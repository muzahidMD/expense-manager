<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [CategoryController::class, 'index']);
Route::post('/create', [CategoryController::class, 'create']);