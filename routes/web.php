<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';
require __DIR__.'/public.php';
require __DIR__.'/private.php';
require __DIR__.'/admin.php';

Route::get('/locale/{locale}', function (string $locale) {
    $locales = config('localization.locales');
    $isoArray = array_column($locales, 'iso');

    if (! in_array($locale, $isoArray)) {
        abort(400);
    }
    Session()->put('locale', $locale);

    return redirect()->back();
})->name('locale');
