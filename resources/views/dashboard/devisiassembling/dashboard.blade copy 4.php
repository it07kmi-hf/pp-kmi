@extends('layouts.dashboard')
@section('title', 'Dashboard Assembling')
@section('page-title', 'Dashboard Monitoring Assembling')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Casegood D1 - Detail Produksi</h1>
            <p class="text-gray-600">Divisi Assembling - PT. KAYUMEBEL INDONESIA</p>
        </div>
        <div class="text-right">
            <p class="text-sm text-gray-500">Data harian</p>
        </div>
    </div>

    <!-- Period Monitoring Section -->
    <div class="bg-white rounded-lg card-shadow p-4 mb-6 flex justify-between items-center">
        <div class="flex items-center">
            <i class="far fa-calendar-alt mr-2 text-gray-500"></i>
            <span class="font-medium text-gray-700">Periode Monitoring</span>
        </div>
        
        <div class="flex items-center space-x-2">
            <button class="px-4 py-1 rounded-full tab-active text-sm font-medium">Harian</button>
            <button class="px-4 py-1 rounded-full text-gray-600 text-sm font-medium hover:bg-gray-100">Mingguan</button>
            <button class="px-4 py-1 rounded-full text-gray-600 text-sm font-medium hover:bg-gray-100">Bulanan</button>
            
            <button class="ml-4 px-3 py-1 rounded-md border border-gray-300 text-gray-600 text-sm flex items-center">
                <i class="fas fa-filter mr-1"></i>
                Filter Periode Khusus
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Unit Output Card -->
        <div class="bg-white rounded-lg card-shadow p-6">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-gray-600 font-medium">Unit Output</h3>
                <i class="fas fa-arrow-up text-gray-400"></i>
            </div>
            <div class="text-3xl font-bold text-gray-800 mb-1">268</div>
            <div class="text-sm text-gray-500">pieces (Harian)</div>
        </div>

        <!-- Unit Value Card -->
        <div class="bg-white rounded-lg card-shadow p-6">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-gray-600 font-medium">Unit Value</h3>
                <i class="fas fa-dollar-sign text-gray-400"></i>
            </div>
            <div class="text-3xl font-bold text-gray-800 mb-1">$13,400</div>
            <div class="text-sm text-gray-500">USD (Harian)</div>
        </div>

        <!-- Work Centers Card -->
        <div class="bg-white rounded-lg card-shadow p-6">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-gray-600 font-medium">Work Centers</h3>
                <i class="fas fa-th-large text-gray-400"></i>
            </div>
            <div class="text-3xl font-bold text-gray-800 mb-1">6</div>
            <div class="text-sm text-gray-500">active work centers</div>
        </div>
    </div>

    <!-- Detail Work Center Section -->
    <div class="bg-white rounded-lg card-shadow p-4 mb-6">
        <div class="flex items-center mb-4">
            <i class="fas fa-cubes mr-2 text-gray-500"></i>
            <span class="font-medium text-gray-700">Detail Work Center - Casegood D1</span>
            <span class="ml-2 px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Harian</span>
        </div>

        <!-- Work Center Item -->
        <div class="border-b pb-4 mb-4">
            <div class="flex items-center justify-between cursor-pointer" onclick="toggleWorkCenters()">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-chevron-down text-green-600"></i>
                    </div>
                    <div>
                        <div class="flex items-center">
                            <i class="fas fa-box mr-2 text-gray-500"></i>
                            <span class="font-medium">Casegood D1</span>
                            <span class="ml-2 text-sm text-gray-500">6 Work Centers</span>
                        </div>
                    </div>
                </div>
                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Harian</span>
            </div>
            
            <!-- Summary Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-cube text-green-500 mr-2"></i>
                        <span class="text-gray-600">Total Quantity</span>
                    </div>
                    <div class="text-xl font-bold text-gray-800">268 pcs</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-dollar-sign text-green-500 mr-2"></i>
                        <span class="text-gray-600">Total Value</span>
                    </div>
                    <div class="text-xl font-bold text-gray-800">$13,400</div>
                </div>
            </div>
            <!-- Work Center Details -->
            <div id="work-centers-details" class="mt-4 pl-11">
                <!-- Work Center 01 -->
                <div class="bg-green-50 rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            <span class="font-medium">Work Center 01</span>
                        </div>
                        <span class="text-sm text-gray-500">D1-WC01</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <i class="fas fa-user mr-2 text-gray-500"></i>
                        <span class="text-gray-700">Budi Santoso</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Quantity</div>
                            <div class="text-lg font-semibold">45 pcs</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Value</div>
                            <div class="text-lg font-semibold">$2,250</div>
                        </div>
                    </div>
                </div>

                <!-- Work Center 02 -->
                <div class="bg-green-50 rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            <span class="font-medium">Work Center 02</span>
                        </div>
                        <span class="text-sm text-gray-500">D1-WC02</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <i class="fas fa-user mr-2 text-gray-500"></i>
                        <span class="text-gray-700">Siti Nurhaliza</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Quantity</div>
                            <div class="text-lg font-semibold">38 pcs</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Value</div>
                            <div class="text-lg font-semibold">$1,900</div>
                        </div>
                    </div>
                </div>

                <!-- Work Center 03 -->
                <div class="bg-green-50 rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            <span class="font-medium">Work Center 03</span>
                        </div>
                        <span class="text-sm text-gray-500">D1-WC03</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <i class="fas fa-user mr-2 text-gray-500"></i>
                        <span class="text-gray-700">Ahmad Yani</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Quantity</div>
                            <div class="text-lg font-semibold">42 pcs</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Value</div>
                            <div class="text-lg font-semibold">$2,100</div>
                        </div>
                    </div>
                </div>

                <!-- Work Center 04 -->
                <div class="bg-green-50 rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            <span class="font-medium">Work Center 04</span>
                        </div>
                        <span class="text-sm text-gray-500">D1-WC04</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <i class="fas fa-user mr-2 text-gray-500"></i>
                        <span class="text-gray-700">Rina Susanti</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Quantity</div>
                            <div class="text-lg font-semibold">39 pcs</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Value</div>
                            <div class="text-lg font-semibold">$1,950</div>
                        </div>
                    </div>
                </div>

                <!-- Work Center 05 -->
                <div class="bg-green-50 rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            <span class="font-medium">Work Center 05</span>
                        </div>
                        <span class="text-sm text-gray-500">D1-WC05</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <i class="fas fa-user mr-2 text-gray-500"></i>
                        <span class="text-gray-700">Joko Widodo</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Quantity</div>
                            <div class="text-lg font-semibold">41 pcs</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Value</div>
                            <div class="text-lg font-semibold">$2,050</div>
                        </div>
                    </div>
                </div>

                <!-- Work Center 06 -->
                <div class="bg-green-50 rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            <span class="font-medium">Work Center 06</span>
                        </div>
                        <span class="text-sm text-gray-500">D1-WC06</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <i class="fas fa-user mr-2 text-gray-500"></i>
                        <span class="text-gray-700">Ani Rahayu</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Quantity</div>
                            <div class="text-lg font-semibold">43 pcs</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Value</div>
                            <div class="text-lg font-semibold">$2,150</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary Section -->
        <!-- <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-blue-50 rounded-lg p-4">
                <div class="flex items-center mb-2">
                    <i class="fas fa-cube text-green-500 mr-2"></i>
                    <span class="text-gray-600">Total Quantity</span>
                </div>
                <div class="text-xl font-bold text-gray-800">268 pcs</div>
            </div>
            <div class="bg-blue-50 rounded-lg p-4">
                <div class="flex items-center mb-2">
                    <i class="fas fa-dollar-sign text-green-500 mr-2"></i>
                    <span class="text-gray-600">Total Value</span>
                </div>
                <div class="text-xl font-bold text-gray-800">$13,400</div>
            </div>
        </div> -->
    </div>
</div>

<script>
    function toggleWorkCenters() {
        const detailsElement = $('#work-centers-details');
        const chevronIcon = $('i.fa-chevron-down', this);
        
        if (detailsElement.is(':visible')) {
            detailsElement.slideUp();
            chevronIcon.removeClass('fa-chevron-down').addClass('fa-chevron-right');
        } else {
            detailsElement.slideDown();
            chevronIcon.removeClass('fa-chevron-right').addClass('fa-chevron-down');
        }
    }
</script>
@endsection