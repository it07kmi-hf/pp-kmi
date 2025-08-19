@extends('layouts.dashboard')

@section('title', 'Asemmbling Dashboard')
@section('page-title', 'Asemmbling Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-blue-100 p-3 rounded-lg">
                <i class="fas fa-puzzle-piece text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Parts Ready</h3>
                <p class="text-2xl font-bold text-blue-600">240</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-green-100 p-3 rounded-lg">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Assembled</h3>
                <p class="text-2xl font-bold text-green-600">45</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-yellow-100 p-3 rounded-lg">
                <i class="fas fa-tools text-yellow-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">In Assembly</h3>
                <p class="text-2xl font-bold text-yellow-600">12</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-purple-100 p-3 rounded-lg">
                <i class="fas fa-users text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Workers</h3>
                <p class="text-2xl font-bold text-purple-600">15</p>
            </div>
        </div>
    </div>
</div>

<!-- Content Area -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Assembly Line Status</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div>
                    <p class="text-sm font-medium">Line A - Dining Tables</p>
                    <p class="text-xs text-gray-600">Progress: 8/10 units</p>
                </div>
                <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">Active</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div>
                    <p class="text-sm font-medium">Line B - Chairs</p>
                    <p class="text-xs text-gray-600">Progress: 15/20 units</p>
                </div>
                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded">Running</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div>
                    <p class="text-sm font-medium">Line C - Cabinets</p>
                    <p class="text-xs text-gray-600">Progress: 3/5 units</p>
                </div>
                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">Setup</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Quality Control</h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Pass Rate</span>
                <span class="text-sm font-medium text-green-600">95.2%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-green-600 h-2 rounded-full" style="width: 95.2%"></div>
            </div>
            
            <div class="flex items-center justify-between mt-4">
                <span class="text-sm text-gray-600">Defect Rate</span>
                <span class="text-sm font-medium text-red-600">4.8%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-red-600 h-2 rounded-full" style="width: 4.8%"></div>
            </div>
        </div>
    </div>
</div>
@endsection