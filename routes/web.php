<?php

use App\Http\Controllers\WebAdmin\{CategoryController, DashboardController, LoginController, RegisterController};
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.login');
    Route::get('/register', [RegisterController::class, 'index'])->name('admin.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('admin.register');
    Route::post('/logout', [RegisterController::class, 'logout'])->name('admin.logout');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('/admin')->group(function () {
        // dashboard section
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

        // category section
        Route::controller(CategoryController::class)->prefix('/categories')->name('admin.categories.')->group(function () {
            Route::get('/', 'index')->name('index');
        });

        // don't remove below line
    });
});

Route::get('/{any}', fn() => view('website'))->name('website')->where('any', '.*');
