<?php 
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request; 

use App\Http\Controllers\AuthController;
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });
});