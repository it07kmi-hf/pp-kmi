@extends('layouts.dashboard')

@section('title', 'Dashboard Machinning')
@section('page-title', 'Dashboard Machinning')

@section('content')
<div class="space-y-6">
    <!-- Welcome Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang di Dashboard Machinning</h1>
        <p class="text-gray-600">Monitor operasi mesin dan proses produksi divisi Machinning.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <i class="fas fa-cogs text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Mesin Aktif</h3>
                    <p class="text-2xl font-bold text-gray-900">12/15</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="fas fa-tachometer-alt text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Efisiensi</h3>
                    <p class="text-2xl font-bold text-gray-900">94%</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-boxes text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Output Hari Ini</h3>
                    <p class="text-2xl font-bold text-gray-900">567</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-orange-100 rounded-lg">
                    <i class="fas fa-tools text-orange-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Maintenance</h3>
                    <p class="text-2xl font-bold text-gray-900">2</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Machine Status -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Status Mesin</h2>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="border rounded-lg p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-medium">CNC Machine #01</h3>
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Aktif</span>
                    </div>
                    <p class="text-sm text-gray-600">Output: 45 unit/jam</p>
                </div>
                <div class="border rounded-lg p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-medium">Planer #02</h3>
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Standby</span>
                    </div>
                    <p class="text-sm text-gray-600">Output: 0 unit/jam</p>
                </div>
                <div class="border rounded-lg p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-medium">Router #03</h3>
                        <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Maintenance</span>
                    </div>
                    <p class="text-sm text-gray-600">Estimasi: 2 jam</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection