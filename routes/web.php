<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/login', [LoginController::class, 'index'])
    ->name('login.index');

Route::get('/register', [RegisterController::class, 'index'])
    ->name('register.index');

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
    
