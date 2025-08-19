@extends('layouts.dashboard')

@section('title', 'Packing Dashboard')
@section('page-title', 'Packing Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-blue-100 p-3 rounded-lg">
                <i class="fas fa-box text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Ready to Pack</h3>
                <p class="text-2xl font-bold text-blue-600">42</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-green-100 p-3 rounded-lg">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Packed</h3>
                <p class="text-2xl font-bold text-green-600">38</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-yellow-100 p-3 rounded-lg">
                <i class="fas fa-truck text-yellow-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Shipped</h3>
                <p class="text-2xl font-bold text-yellow-600">25</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-purple-100 p-3 rounded-lg">
                <i class="fas fa-clipboard-list text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Orders</h3>
                <p class="text-2xl font-bold text-purple-600">18</p>
            </div>
        </div>
    </div>
</div>

<!-- Content Area -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Shipping Queue</h3>
        <div class="space-y-4">
            <div class="border border-gray-200 rounded-lg p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium">Order #2024-001</span>
                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">Packed</span>
                </div>
                <p class="text-xs text-gray-600">Dining Table Set - Customer: PT. ABC</p>
                <p class="text-xs text-gray-600">Ship Date: Today</p>
            </div>
            
            <div class="border border-gray-200 rounded-lg p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium">Order #2024-002</span>
                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">Packing</span>
                </div>
                <p class="text-xs text-gray-600">Office Chairs (12 units) - Customer: PT. XYZ</p>
                <p class="text-xs text-gray-600">Ship Date: Tomorrow</p>
            </div>
            
            <div class="border border-gray-200 rounded-lg p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium">Order #2024-003</span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded">Pending</span>
                </div>
                <p class="text-xs text-gray-600">Cabinet Set - Customer: Hotel DEF</p>
                <p class="text-xs text-gray-600">Ship Date: 2 days</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Packaging Materials</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-box text-brown-600 mr-3"></i>
                    <span class="text-sm font-medium">Cardboard Boxes</span>
                </div>
                <span class="text-sm text-green-600 font-medium">250 units</span>
            </div>
            
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-tape text-gray-600 mr-3"></i>
                    <span class="text-sm font-medium">Packaging Tape</span>
                </div>
                <span class="text-sm text-green-600 font-medium">45 rolls</span>
            </div>
            
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-shield-alt text-blue-600 mr-3"></i>
                    <span class="text-sm font-medium">Bubble Wrap</span>
                </div>
                <span class="text-sm text-yellow-600 font-medium">12 rolls</span>
            </div>
            
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-tags text-purple-600 mr-3"></i>
                    <span class="text-sm font-medium">Labels</span>
                </div>
                <span class="text-sm text-red-600 font-medium">25 sheets</span>
            </div>
        </div>
    </div>
</div>
@endsection