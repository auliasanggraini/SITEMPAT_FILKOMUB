<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;

// This route returns the Vue.js frontend
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard');
    Route::get('/peminjaman', [BookingController::class, 'indexPage']);
    Route::get('/peminjaman/create', [BookingController::class, 'createPage']);
    Route::get('/profile');
    // Route::get('/profile', ['ProfileController::class, 'show']);
    // Route::put('/profile', ['ProfileController::class, 'update']);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
