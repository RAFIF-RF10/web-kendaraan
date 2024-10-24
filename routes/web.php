<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehiclesController;

Route::get('/', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('doLogin');

// Route::post('login', [AuthCo])

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('/vehicle', VehiclesController::class)->names([
    'index' => 'vehicle.index',
]);