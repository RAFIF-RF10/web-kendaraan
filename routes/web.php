<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('doLogin');

// Route::post('login', [AuthCo])

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');