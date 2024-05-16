<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PeminjamanController;

Route::resource('ruangans', RuanganController::class);
Route::resource('peminjamans', PeminjamanController::class);

Route::get('/', function () {
    return view('welcome');
});
