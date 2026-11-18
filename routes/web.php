<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/theme/{theme}', function ($theme) {

    if (in_array($theme, ['light', 'dark'])) {
        session(['theme' => $theme]);
    }

    return back();

})->name('theme.change');
