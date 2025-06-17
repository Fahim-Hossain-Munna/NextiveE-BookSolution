<?php

use App\Http\Controllers\WebAdmin\{BookController, CategoryController, DashboardController, LoginController, RegisterController, TransactionController};
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
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/delete/{category}', 'delete')->name('delete');
        });

        // book section
        Route::controller(BookController::class)->prefix('/e-books')->name('admin.books.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/delete/{book}', 'delete')->name('delete');
        });

        // transactions section
        Route::controller(TransactionController::class)->prefix('/transactions')->name('admin.transactions.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/delete/{transaction}', 'delete')->name('delete');
        });

        // don't remove below line
    });
});

Route::get('/{any}', fn() => view('website'))->name('website')->where('any', '.*');
