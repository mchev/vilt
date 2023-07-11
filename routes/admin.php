<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');

    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index')->name('users.index');
        Route::get('users/create', 'create')->name('users.create');
        Route::post('users', 'store')->name('users.store');
        Route::get('users/{user}/edit', 'edit')->name('users.edit');
        Route::put('users/{user}', 'update')->name('users.update');
        Route::delete('users/{user}', 'destroy')->name('users.destroy');
    });

    Route::controller(PageController::class)->group(function () {
        Route::get('pages', 'index')->name('pages.index');
        Route::get('pages/create', 'create')->name('pages.create');
        Route::post('pages', 'store')->name('pages.store');
        Route::get('pages/{page}/edit', 'edit')->name('pages.edit');
        Route::put('pages/{page}', 'update')->name('pages.update');
        Route::delete('pages/{page}', 'destroy')->name('pages.destroy');
    });
});
