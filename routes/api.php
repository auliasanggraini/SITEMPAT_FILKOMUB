<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/peminjaman/create', [BookingController::class, 'store']);
Route::post('/peminjaman/update', [BookingController::class, 'update']);
Route::post('/peminjaman/delete', [BookingController::class, 'delete']);
    // Route::get('/profile', ['ProfileController::class, 'show']);
    // Route::put('/profile', ['ProfileController::class, 'update']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
