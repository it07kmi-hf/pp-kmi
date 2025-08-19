<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\ReportBuyerController;
use App\Http\Controllers\TargetPerformanceController;
use App\Http\Controllers\LaporanController;

// Public routes
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // ================= ADMIN =================
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
        ->middleware('role:admin')
        ->name('admin.dashboard');

    Route::get('/admin/monitoring-produksi', [MonitoringController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.monitoring.produksi');

    Route::get('/admin/report-buyer', [ReportBuyerController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.report.buyer');

    Route::get('/admin/target-performance', [TargetPerformanceController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.target.performance');

    Route::get('/admin/laporan-periode', [LaporanController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.laporan.periode');

    // ================= PEMBAHANAN =================
    Route::get('/pembahanan/dashboard', [DashboardController::class, 'pembahannanDashboard'])
        ->middleware('role:pembahanan')
        ->name('pembahanan.dashboard');

    Route::get('/pembahanan/monitoring-produksi', [MonitoringController::class, 'index'])
        ->middleware('role:pembahanan')
        ->name('pembahanan.monitoring.produksi');

    Route::get('/pembahanan/report-buyer', [ReportBuyerController::class, 'index'])
        ->middleware('role:pembahanan')
        ->name('pembahanan.report.buyer');

    Route::get('/pembahanan/target-performance', [TargetPerformanceController::class, 'index'])
        ->middleware('role:pembahanan')
        ->name('pembahanan.target.performance');

    Route::get('/pembahanan/laporan-periode', [LaporanController::class, 'index'])
        ->middleware('role:pembahanan')
        ->name('pembahanan.laporan.periode');

    // ================= MACHINNING =================
    Route::get('/machinning/dashboard', [DashboardController::class, 'machinningDashboard'])
        ->middleware('role:machinning')
        ->name('machinning.dashboard');

    Route::get('/machinning/monitoring-produksi', [MonitoringController::class, 'index'])
        ->middleware('role:machinning')
        ->name('machinning.monitoring.produksi');

    Route::get('/machinning/report-buyer', [ReportBuyerController::class, 'index'])
        ->middleware('role:machinning')
        ->name('machinning.report.buyer');

    Route::get('/machinning/target-performance', [TargetPerformanceController::class, 'index'])
        ->middleware('role:machinning')
        ->name('machinning.target.performance');

    Route::get('/machinning/laporan-periode', [LaporanController::class, 'index'])
        ->middleware('role:machinning')
        ->name('machinning.laporan.periode');

    // ================= ASEMMBLING =================
    Route::get('/asemmbling/dashboard', [DashboardController::class, 'asemmblingDashboard'])
        ->middleware('role:asemmbling')
        ->name('asemmbling.dashboard');

    Route::get('/asemmbling/monitoring-produksi', [MonitoringController::class, 'index'])
        ->middleware('role:asemmbling')
        ->name('asemmbling.monitoring.produksi');

    Route::get('/asemmbling/report-buyer', [ReportBuyerController::class, 'index'])
        ->middleware('role:asemmbling')
        ->name('asemmbling.report.buyer');

    Route::get('/asemmbling/target-performance', [TargetPerformanceController::class, 'index'])
        ->middleware('role:asemmbling')
        ->name('asemmbling.target.performance');

    Route::get('/asemmbling/laporan-periode', [LaporanController::class, 'index'])
        ->middleware('role:asemmbling')
        ->name('asemmbling.laporan.periode');

    // ================= FINISHING =================
    Route::get('/finishing/dashboard', [DashboardController::class, 'finishingDashboard'])
        ->middleware('role:finishing')
        ->name('finishing.dashboard');

    Route::get('/finishing/monitoring-produksi', [MonitoringController::class, 'index'])
        ->middleware('role:finishing')
        ->name('finishing.monitoring.produksi');

    Route::get('/finishing/report-buyer', [ReportBuyerController::class, 'index'])
        ->middleware('role:finishing')
        ->name('finishing.report.buyer');

    Route::get('/finishing/target-performance', [TargetPerformanceController::class, 'index'])
        ->middleware('role:finishing')
        ->name('finishing.target.performance');

    Route::get('/finishing/laporan-periode', [LaporanController::class, 'index'])
        ->middleware('role:finishing')
        ->name('finishing.laporan.periode');

    // ================= PACKING =================
    Route::get('/packing/dashboard', [DashboardController::class, 'packingDashboard'])
        ->middleware('role:packing')
        ->name('packing.dashboard');

    Route::get('/packing/monitoring-produksi', [MonitoringController::class, 'index'])
        ->middleware('role:packing')
        ->name('packing.monitoring.produksi');

    Route::get('/packing/report-buyer', [ReportBuyerController::class, 'index'])
        ->middleware('role:packing')
        ->name('packing.report.buyer');

    Route::get('/packing/target-performance', [TargetPerformanceController::class, 'index'])
        ->middleware('role:packing')
        ->name('packing.target.performance');

    Route::get('/packing/laporan-periode', [LaporanController::class, 'index'])
        ->middleware('role:packing')
        ->name('packing.laporan.periode');
});
