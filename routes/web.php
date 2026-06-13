<?php

use App\Http\Controllers\BuahController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BuahController as AdminBuahController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

// ===== PUBLIC ROUTES =====
Route::get('/', [BuahController::class, 'index'])->name('buah.index');
Route::get('/buah/{slug}', [BuahController::class, 'show'])->name('buah.show');

// ===== ADMIN ROUTES =====
Route::prefix('admin')->name('admin.')->group(function () {

    // Login routes (TANPA middleware auth)
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Routes yang butuh login (middleware auth)
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('buah', AdminBuahController::class);
    });

});