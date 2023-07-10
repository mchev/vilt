<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth:sanctum', 'verified', 'administrator'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // Dashboard
        Route::get('/', [DashboardController::class])
        ->name('dashboard');

        // Users resource
        Route::resource('users', UserController::class)
        ->except(['show'])
        ->names('users');

        // Pages resources
        Route::resource('pages', PageController::class)
        ->except(['show'])
        ->names('pages');
    });
