<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('register', [AuthController::class, 'register']);
});

Route::resource('bookings', BookingsController::class);
Route::post('bookings/{id}/approve', [BookingsController::class, 'approve'])->middleware('auth:sanctum');
Route::post('bookings/{id}/reject', [BookingsController::class, 'reject'])->middleware('auth:sanctum');
