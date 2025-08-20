@extends('layouts.dashboard')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')
<div class="space-y-6">
    <!-- Welcome Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang di Dashboard Admin</h1>
        <p class="text-gray-600">Kelola proses admin dan monitor aktivitas divisi Anda.</p>
    </div>

    <!-- Stats Cards -->
    <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-cut text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Material Diproses</h3>
                    <p class="text-2xl font-bold text-gray-900">1,234</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Selesai Hari Ini</h3>
                    <p class="text-2xl font-bold text-gray-900">98</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-yellow-100 rounded-lg">
                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Dalam Proses</h3>
                    <p class="text-2xl font-bold text-gray-900">45</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-red-100 rounded-lg">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Bermasalah</h3>
                    <p class="text-2xl font-bold text-gray-900">3</p>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Recent Activity -->
    <!-- <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Aktivitas Terbaru</h2>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex items-center space-x-4">
                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                    <span class="text-sm text-gray-600">Material kayu mahoni 50x30cm berhasil dipotong - 10:30</span>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                    <span class="text-sm text-gray-600">Batch #12345 dimulai proses pembahanan - 09:15</span>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                    <span class="text-sm text-gray-600">Quality check material jati grade A - 08:45</span>
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection