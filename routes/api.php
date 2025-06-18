<?php

use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthenticationController::class, 'login']);
Route::post('register', [AuthenticationController::class, 'register']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/books', [BookController::class, 'index']);


Route::middleware(['auth:api'])->group(function () {
    Route::get('/book/{id}', [BookController::class, 'show']);
    Route::post('/transaction', [TransactionController::class, 'store']);
});
