<?php

use Illuminate\Support\Facades\Route;

// This route returns the Vue.js frontend
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
