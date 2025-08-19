@extends('layouts.dashboard')

@section('title', 'Machinning Dashboard')
@section('page-title', 'Machinning Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-blue-100 p-3 rounded-lg">
                <i class="fas fa-cogs text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Machines Active</h3>
                <p class="text-2xl font-bold text-blue-600">8/10</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-green-100 p-3 rounded-lg">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Completed</h3>
                <p class="text-2xl font-bold text-green-600">85</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-yellow-100 p-3 rounded-lg">
                <i class="fas fa-wrench text-yellow-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">In Process</h3>
                <p class="text-2xl font-bold text-yellow-600">15</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-red-100 p-3 rounded-lg">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Maintenance</h3>
                <p class="text-2xl font-bold text-red-600">2</p>
            </div>
        </div>
    </div>
</div>

<!-- Content Area -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Machine Status</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                    <span class="text-sm font-medium">CNC Machine #1</span>
                </div>
                <span class="text-xs text-green-600 font-medium">Running</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></div>
                    <span class="text-sm font-medium">Cutting Machine #2</span>
                </div>
                <span class="text-xs text-yellow-600 font-medium">Idle</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                    <span class="text-sm font-medium">Drilling Machine #3</span>
                </div>
                <span class="text-xs text-red-600 font-medium">Maintenance</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Production Queue</h3>
        <div class="space-y-3">
            <div class="border-l-4 border-blue-500 pl-4 py-2">
                <p class="text-sm font-medium">Table Top - Order #2024-001</p>
                <p class="text-xs text-gray-600">Estimated: 2 hours</p>
            </div>
            <div class="border-l-4 border-green-500 pl-4 py-2">
                <p class="text-sm font-medium">Chair Legs - Order #2024-002</p>
                <p class="text-xs text-gray-600">Estimated: 1.5 hours</p>
            </div>
            <div class="border-l-4 border-yellow-500 pl-4 py-2">
                <p class="text-sm font-medium">Cabinet Door - Order #2024-003</p>
                <p class="text-xs text-gray-600">Estimated: 3 hours</p>
            </div>
        </div>
    </div>
</div>
@endsection