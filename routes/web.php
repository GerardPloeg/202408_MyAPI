<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('book', BookController::class);

Route::get('/book', [BookController::class, 'index']);
Route::get('/book/{book}', [BookController::class, 'show']);
Route::post('/book', [BookController::class, 'store']);
Route::put('/book/{book}', [BookController::class, 'update']);
Route::delete('/book/{book}', [BookController::class, 'destroy']);
