<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\BookingsController;// Controller untuk CRUD pemesanan kendaraan
use App\Http\Controllers\ApprovalController; // Controller untuk persetujuan pemesanan

// Route untuk halaman register sebagai halaman awal
Route::get('/', [AuthController::class, 'registerView'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('doRegister');

// Route untuk login
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('doLogin');

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk halaman yang dilindungi (hanya bisa diakses setelah login)
Route::middleware(['auth'])->group(function () {
    // Route untuk dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Resource controller untuk kendaraan
    Route::resource('vehicle', VehiclesController::class)->names([
        'index' => 'vehicle.index'
    ]);

        // Route untuk CRUD pemesanan kendaraan (Booking)
                Route::resource('bookings', BookingsController::class)->names([
                    'index' => 'bookings.index',
                    'create' => 'bookings.create',
                    'store' => 'bookings.store',
                    'edit' => 'bookings.edit',
                    'update' => 'bookings.update',
                    'destroy' => 'bookings.destroy'
                ]);

            // Route untuk persetujuan pemesanan kendaraan
            Route::get('approvals', [ApprovalController::class, 'index'])->name('approvals.index'); // Menampilkan daftar pemesanan yang perlu disetujui
            Route::post('approvals/{booking}/approve', [ApprovalController::class, 'approve'])->name('approvals.approve'); // Menyetujui pemesanan

            // Route untuk export laporan
            Route::get('report/export', [BookingsController::class, 'export'])->name('report.export'); // Export laporan ke Excel
});
