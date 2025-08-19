@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')
@section('page-title', 'Admin Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-blue-100 p-3 rounded-lg">
                <i class="fas fa-cubes text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Admin KMI</h3>
                <!-- <p class="text-2xl font-bold text-blue-600">150</p> -->
            </div>
        </div>
    </div>

    <!-- <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-green-100 p-3 rounded-lg">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Processed</h3>
                <p class="text-2xl font-bold text-green-600">125</p>
            </div>
        </div>
    </div> -->

    <!-- <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-yellow-100 p-3 rounded-lg">
                <i class="fas fa-clock text-yellow-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">In Progress</h3>
                <p class="text-2xl font-bold text-yellow-600">25</p>
            </div>
        </div>
    </div> -->

    <!-- <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-red-100 p-3 rounded-lg">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Issues</h3>
                <p class="text-2xl font-bold text-red-600">3</p>
            </div>
        </div>
    </div> -->
</div>

<!-- Content Area -->
<!-- <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Activities</h3>
        <div class="space-y-4">
            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                <i class="fas fa-plus-circle text-green-600 mr-3"></i>
                <div>
                    <p class="text-sm font-medium">Material Added</p>
                    <p class="text-xs text-gray-600">Wood planks - 50 units</p>
                </div>
            </div>
            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                <i class="fas fa-tools text-blue-600 mr-3"></i>
                <div>
                    <p class="text-sm font-medium">Processing Started</p>
                    <p class="text-xs text-gray-600">Batch #2024-001</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
        <div class="grid grid-cols-2 gap-4">
            <button class="bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200">
                <i class="fas fa-plus mr-2"></i>Add Material
            </button>
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200">
                <i class="fas fa-eye mr-2"></i>View Reports
            </button>
            <button class="bg-yellow-600 hover:bg-yellow-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200">
                <i class="fas fa-clipboard mr-2"></i>Inventory
            </button>
            <button class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200">
                <i class="fas fa-chart-line mr-2"></i>Analytics
            </button>
        </div>
    </div>
</div> -->
@endsection