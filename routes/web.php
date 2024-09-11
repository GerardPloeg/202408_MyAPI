<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\BookOwnerController;

Route::apiResource('owner', OwnerController::class);

Route::get('/book', [BookController::class, 'index']);
Route::get('/book/{book}', [BookController::class, 'show']);
Route::post('/book', [BookController::class, 'store']);
Route::put('/book/{book}', [BookController::class, 'update']);
Route::delete('/book/{book}', [BookController::class, 'destroy']);

Route::get('/mybooks/{owner}', [BookOwnerController::class, 'mybooks']);
Route::put('/buybook/{owner}', [BookOwnerController::class, 'buybook']);
Route::put('/buybookto', [BookOwnerController::class, 'buybookto']);