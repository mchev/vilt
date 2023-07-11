<?php

use App\Http\Controllers\Private\ChirpController;
use App\Http\Controllers\Private\HomeController;
use App\Http\Controllers\Private\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Private Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/home', HomeController::class)->name('home');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::controller(ChirpController::class)->group(function () {
        Route::get('/chirps', 'index')->name('chirps.index');
        Route::get('/chirps/create', 'create')->name('chirps.create');
        Route::post('/chirps', 'store')->name('chirps.store');
        Route::get('/chirps/{chirp}', 'show')->name('chirps.show');
        Route::get('/chirps/{chirp}/edit', 'edit')->name('chirps.edit');
        Route::put('/chirps/{chirp}', 'update')->name('chirps.update');
        Route::delete('/chirps/{chirp}', 'destroy')->name('chirps.destroy');
    });
});
