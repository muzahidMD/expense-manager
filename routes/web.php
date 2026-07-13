<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category/create', [CategoryController::class, 'create']);
