<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssemblingDashboardController;
use App\Http\Controllers\AssemblingMonitoringController;
use App\Http\Controllers\AssemblingReportBuyerController;
use App\Http\Controllers\AssemblingTargetPerformanceController;
use App\Http\Controllers\AssemblingLaporanController;


use App\Http\Controllers\TestSAPController;

Route::get('/sap/plopro', [TestSAPController::class, 'getPloPro']);
Route::get('/sap/update', [TestSAPController::class, 'syncSAPAjax']);


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
    Route::get('/dashboard', [AssemblingDashboardController::class, 'index'])->name('dashboard');
    
    // ================= ADMIN =================
    Route::get('/admin/dashboard', [AssemblingDashboardController::class, 'adminDashboard'])
        ->middleware('role:admin')
        ->name('admin.dashboard');

    Route::get('/admin/monitoring-produksi', [AssemblingMonitoringController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.monitoring.produksi');

    Route::get('/admin/report-buyer', [AssemblingReportBuyerController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.report.buyer');

    Route::get('/admin/target-performance', [AssemblingTargetPerformanceController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.target.performance');

    Route::get('/admin/laporan-periode', [AssemblingLaporanController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.laporan.periode');

    // ================= PEMBAHANAN =================
    Route::get('/pembahanan/dashboard', [AssemblingDashboardController::class, 'pembahannanDashboard'])
        ->middleware('role:pembahanan')
        ->name('pembahanan.dashboard');

    Route::get('/pembahanan/monitoring-produksi', [AssemblingMonitoringController::class, 'index'])
        ->middleware('role:pembahanan')
        ->name('pembahanan.monitoring.produksi');

    Route::get('/pembahanan/report-buyer', [AssemblingReportBuyerController::class, 'index'])
        ->middleware('role:pembahanan')
        ->name('pembahanan.report.buyer');

    Route::get('/pembahanan/target-performance', [AssemblingTargetPerformanceController::class, 'index'])
        ->middleware('role:pembahanan')
        ->name('pembahanan.target.performance');

    Route::get('/pembahanan/laporan-periode', [AssemblingLaporanController::class, 'index'])
        ->middleware('role:pembahanan')
        ->name('pembahanan.laporan.periode');

    // ================= MACHINNING =================
    Route::get('/machinning/dashboard', [AssemblingDashboardController::class, 'machinningDashboard'])
        ->middleware('role:machinning')
        ->name('machinning.dashboard');

    Route::get('/machinning/monitoring-produksi', [AssemblingMonitoringController::class, 'index'])
        ->middleware('role:machinning')
        ->name('machinning.monitoring.produksi');

    Route::get('/machinning/report-buyer', [AssemblingReportBuyerController::class, 'index'])
        ->middleware('role:machinning')
        ->name('machinning.report.buyer');

    Route::get('/machinning/target-performance', [AssemblingTargetPerformanceController::class, 'index'])
        ->middleware('role:machinning')
        ->name('machinning.target.performance');

    Route::get('/machinning/laporan-periode', [AssemblingLaporanController::class, 'index'])
        ->middleware('role:machinning')
        ->name('machinning.laporan.periode');

    // // ================= ASEMMBLING =================
    Route::get('/assembling/dashboard', [AssemblingDashboardController::class, 'assemblingDashboard'])
        ->middleware('role:assembling')
        ->name('assembling.dashboard');

    Route::get('/assembling/monitoring-produksi', [AssemblingMonitoringController::class, 'index'])
        ->middleware('role:assembling')
        ->name('assembling.monitoring.produksi');

    // API dummy untuk ambil data berdasarkan line
    Route::get('/assembling/monitoring-produksi/{line}', [AssemblingMonitoringController::class, 'getByLine'])
        ->middleware('role:assembling')
        ->name('assembling.monitoring.produksi.line');

    Route::get('/assembling/report-buyer', [AssemblingReportBuyerController::class, 'index'])
        ->middleware('role:assembling')
        ->name('assembling.report.buyer');

    Route::get('/assembling/target-performance', [AssemblingTargetPerformanceController::class, 'index'])
        ->middleware('role:assembling')
        ->name('assembling.target.performance');

    Route::get('/assembling/laporan-periode', [AssemblingLaporanController::class, 'index'])
        ->middleware('role:assembling')
        ->name('assembling.laporan.periode');

    // ================= FINISHING =================
    Route::get('/finishing/dashboard', [AssemblingDashboardController::class, 'finishingDashboard'])
        ->middleware('role:finishing')
        ->name('finishing.dashboard');

    Route::get('/finishing/monitoring-produksi', [AssemblingMonitoringController::class, 'index'])
        ->middleware('role:finishing')
        ->name('finishing.monitoring.produksi');

    Route::get('/finishing/report-buyer', [AssemblingReportBuyerController::class, 'index'])
        ->middleware('role:finishing')
        ->name('finishing.report.buyer');

    Route::get('/finishing/target-performance', [AssemblingTargetPerformanceController::class, 'index'])
        ->middleware('role:finishing')
        ->name('finishing.target.performance');

    Route::get('/finishing/laporan-periode', [AssemblingLaporanController::class, 'index'])
        ->middleware('role:finishing')
        ->name('finishing.laporan.periode');

    // ================= PACKING =================
    Route::get('/packing/dashboard', [AssemblingDashboardController::class, 'packingDashboard'])
        ->middleware('role:packing')
        ->name('packing.dashboard');

    Route::get('/packing/monitoring-produksi', [AssemblingMonitoringController::class, 'index'])
        ->middleware('role:packing')
        ->name('packing.monitoring.produksi');

    Route::get('/packing/report-buyer', [AssemblingReportBuyerController::class, 'index'])
        ->middleware('role:packing')
        ->name('packing.report.buyer');

    Route::get('/packing/target-performance', [AssemblingTargetPerformanceController::class, 'index'])
        ->middleware('role:packing')
        ->name('packing.target.performance');

    Route::get('/packing/laporan-periode', [AssemblingLaporanController::class, 'index'])
        ->middleware('role:packing')
        ->name('packing.laporan.periode');
});
