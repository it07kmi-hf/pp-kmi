@extends('layouts.dashboard')

@section('title', 'Dashboard Packing')
@section('page-title', 'Dashboard Packing')

@section('content')
<div class="space-y-6">
    <!-- Welcome Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang di Dashboard Packing</h1>
        <p class="text-gray-600">Kelola proses packaging dan pengiriman produk furniture.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-teal-100 rounded-lg">
                    <i class="fas fa-box text-teal-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Siap Dikemas</h3>
                    <p class="text-2xl font-bold text-gray-900">45</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-boxes text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Sudah Dikemas</h3>
                    <p class="text-2xl font-bold text-gray-900">78</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="fas fa-truck text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Siap Kirim</h3>
                    <p class="text-2xl font-bold text-gray-900">23</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <i class="fas fa-shipping-fast text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Dalam Pengiriman</h3>
                    <p class="text-2xl font-bold text-gray-900">12</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Packing Queue -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Antrian Packing</h2>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="border rounded-lg p-4 flex justify-between items-center">
                    <div>
                        <h3 class="font-medium">Order #12345 - Meja Executive</h3>
                        <p class="text-sm text-gray-600">Prioritas: High | Deadline: Hari ini 15:00</p>
                    </div>
                    <div class="flex space-x-2">
                        <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs">Urgent</span>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">
                            Mulai Packing
                        </button>
                    </div>
                </div>
                <div class="border rounded-lg p-4 flex justify-between items-center">
                    <div>
                        <h3 class="font-medium">Order #12346 - Lemari 3 Pintu</h3>
                        <p class="text-sm text-gray-600">Prioritas: Medium | Deadline: Besok 10:00</p>
                    </div>
                    <div class="flex space-x-2">
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Normal</span>
                        <button class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg text-sm">
                            Dalam Antrian
                        </button>
                    </div>
                </div>
                <div class="border rounded-lg p-4 flex justify-between items-center">
                    <div>
                        <h3 class="font-medium">Order #12347 - Kursi Office</h3>
                        <p class="text-sm text-gray-600">Prioritas: Low | Deadline: 2 hari lagi</p>
                    </div>
                    <div class="flex space-x-2">
                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs">Low</span>
                        <button class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg text-sm">
                            Dalam Antrian
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection