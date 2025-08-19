<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Public routes
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Admin dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
        ->middleware('role:admin')
        ->name('admin.dashboard');

    // Pembahanan dashboard
    Route::get('/pembahanan/dashboard', [DashboardController::class, 'pembahannanDashboard'])
        ->middleware('role:pembahanan')
        ->name('pembahanan.dashboard');
    
    // Machinning dashboard
    Route::get('/machinning/dashboard', [DashboardController::class, 'machinningDashboard'])
        ->middleware('role:machinning')
        ->name('machinning.dashboard');
    
    // Asemmbling dashboard
    Route::get('/asemmbling/dashboard', [DashboardController::class, 'asemmbling Dashboard'])
        ->middleware('role:asemmbling')
        ->name('asemmbling.dashboard');
    
    // Finishing dashboard
    Route::get('/finishing/dashboard', [DashboardController::class, 'finishingDashboard'])
        ->middleware('role:finishing')
        ->name('finishing.dashboard');
    
    // Packing dashboard
    Route::get('/packing/dashboard', [DashboardController::class, 'packingDashboard'])
        ->middleware('role:packing')
        ->name('packing.dashboard');
});