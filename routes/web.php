<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register generic web routes for your application.
| For public, private and admin routes, see the files in the routes directory.
|
*/

require __DIR__.'/auth.php';
require __DIR__.'/public.php';
require __DIR__.'/private.php';
require __DIR__.'/admin.php';

Route::get('/locale/{locale}', fn (string $locale) => in_array($locale, array_column(config('localization.locales'), 'iso'))
        ? session()->put('locale', $locale)
        : abort(400)
)->name('locale');
