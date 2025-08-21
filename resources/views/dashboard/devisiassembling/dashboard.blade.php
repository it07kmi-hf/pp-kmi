@extends('layouts.dashboard')
@section('title', 'Dashboard Assembling')
@section('page-title', 'Dashboard Monitoring Assembling')
@section('content')
<style>
    .active-period {
        background-color: #6B7280 !important;
        color: white !important;
    }
    .filter-tab-btn.active {
        background-color: #10B981 !important;
        color: white !important;
        border-color: #10B981 !important;
    }
    .filter-tab-btn {
        transition: all 0.2s ease;
    }
</style>

<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-semibold text-gray-800">Assembling Monitoring</h1>
        <div class="flex space-x-2">
            <button class="px-4 py-1 text-sm rounded-full bg-white border border-gray-200 active-period" id="dailyBtn">Harian</button>
            <button class="px-4 py-1 text-sm rounded-full bg-white border border-gray-200" id="weeklyBtn">Mingguan</button>
            <button class="px-4 py-1 text-sm rounded-full bg-white border border-gray-200" id="monthlyBtn">Bulanan</button>
            
            <div class="relative">
                <button class="px-3 py-1 text-sm rounded-md bg-white border border-gray-200 flex items-center gap-1" id="customFilterBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    Filter Periode Khusus
                </button>
                
                <!-- Custom Filter Dropdown -->
                <div id="filterDropdown" class="absolute right-0 top-full mt-2 w-80 bg-white rounded-lg shadow-lg border border-gray-200 z-50 hidden">
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-800 mb-2">Filter Periode Khusus</h3>
                        <p class="text-sm text-gray-600 mb-4">Analisa data periode tertentu</p>
                        
                        <!-- Filter Type Tabs -->
                        <div class="flex mb-4">
                            <button id="monthTabBtn" class="filter-tab-btn px-4 py-2 text-sm font-medium rounded-l-lg border border-gray-300 bg-green-100 text-green-800">
                                Bulan Spesifik
                            </button>
                            <button id="dateRangeTabBtn" class="filter-tab-btn px-4 py-2 text-sm font-medium rounded-r-lg border border-gray-300 border-l-0 text-gray-600 hover:bg-gray-50">
                                Range Tanggal
                            </button>
                        </div>
                        
                        <!-- Bulan Spesifik Content -->
                        <div id="monthDropdownContent" class="filter-content">
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Bulan</label>
                                    <select id="monthSelectDropdown" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm">
                                        <option value="january">Januari</option>
                                        <option value="february">Februari</option>
                                        <option value="march">Maret</option>
                                        <option value="april">April</option>
                                        <option value="may">Mei</option>
                                        <option value="june">Juni</option>
                                        <option value="july">Juli</option>
                                        <option value="august" selected>Agustus</option>
                                        <option value="september">September</option>
                                        <option value="october">Oktober</option>
                                        <option value="november">November</option>
                                        <option value="december">Desember</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tahun</label>
                                    <select id="yearSelectDropdown" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm">
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025" selected>2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Range Tanggal Content -->
                        <div id="dateRangeDropdownContent" class="filter-content hidden">
                            <div class="space-y-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                                    <input type="date" id="startDateDropdown" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Akhir</label>
                                    <input type="date" id="endDateDropdown" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-2 pt-4 border-t border-gray-200">
                            <button id="cancelCustomFilter" class="px-4 py-2 text-gray-600 text-sm hover:bg-gray-50 rounded-md">Batal</button>
                            <button id="applyCustomFilter" class="px-4 py-2 bg-green-500 text-white text-sm rounded-md hover:bg-green-600">Terapkan Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Metrics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 metric-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Output</p>
                    <h2 class="text-2xl font-bold text-gray-800" id="totalOutput">1,632</h2>
                    <p class="text-xs text-gray-400">pieces (Harian)</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16v2m0-2v-6m0 6h10m-10 0v-4h10v4m-10 0v-2m10 0v2" />
                </svg>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 metric-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Value</p>
                    <h2 class="text-2xl font-bold text-gray-800" id="totalValue">$131,050</h2>
                    <p class="text-xs text-gray-400">USD (Harian)</p>
                </div>
                <span class="text-gray-400">$</span>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 metric-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Active Units</p>
                    <h2 class="text-2xl font-bold text-gray-800" id="activeUnits">7</h2>
                    <p class="text-xs text-gray-400">production units</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Production Unit Overview -->
    <div class="mb-6">
        <div class="flex items-center gap-2 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016a11.955 11.955 0 01-8.618 3.04M11 14l2 2m0 0l2-2m-2-2l-2 2m2.618-4.016A11.955 11.955 0 0112 2.944" />
            </svg>
            <h2 class="font-medium text-gray-700">Unit Produksi Overview</h2>
            <span class="text-sm text-gray-500">Harian</span>
        </div>

        <!-- Product Grid -->
        <div id="productGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Product cards will be populated by JavaScript -->
        </div>
    </div>
</div>

<script>
    // Dummy data for different time periods
    const dummyData = {
        daily: [
            { name: 'Casegood D1', quantity: 268, value: '$13,400' },
            { name: 'Casegood D2', quantity: 278, value: '$13,900' },
            { name: 'Casegood D3', quantity: 288, value: '$14,400' },
            { name: 'Casegood D4', quantity: 285, value: '$14,250' },
            { name: 'Chair', quantity: 235, value: '$23,500' },
            { name: 'Metal', quantity: 179, value: '$26,850' },
            { name: 'Playfield', quantity: 99, value: '$24,750' }
        ],
        weekly: [
            { name: 'Casegood D1', quantity: 1876, value: '$93,800' },
            { name: 'Casegood D2', quantity: 1946, value: '$97,300' },
            { name: 'Casegood D3', quantity: 2016, value: '$100,800' },
            { name: 'Casegood D4', quantity: 1995, value: '$99,750' },
            { name: 'Chair', quantity: 1645, value: '$164,500' },
            { name: 'Metal', quantity: 1253, value: '$188,000' },
            { name: 'Playfield', quantity: 693, value: '$173,250' }
        ],
        monthly: [
            { name: 'Casegood D1', quantity: 8152, value: '$406,600' },
            { name: 'Casegood D2', quantity: 8452, value: '$422,300' },
            { name: 'Casegood D3', quantity: 8768, value: '$437,200' },
            { name: 'Casegood D4', quantity: 8670, value: '$433,250' },
            { name: 'Chair', quantity: 7145, value: '$714,500' },
            { name: 'Metal', quantity: 5447, value: '$815,650' },
            { name: 'Playfield', quantity: 3011, value: '$752,250' }
        ]
    };

    let currentPeriod = 'daily';
    let currentFilter = null;
    let currentFilterType = 'month';

    // Initialize product grid
    function renderProductGrid(data) {
        const productGrid = $('#productGrid');
        productGrid.empty();
        
        data.forEach(product => {
            const productCard = `
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100 product-card">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                            </svg>
                            <span class="font-medium text-gray-800">${product.name}</span>
                        </div>
                        <span class="text-xs text-gray-500">6 WC</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <div class="flex justify-center mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016a11.955 11.955 0 01-8.618 3.04M11 14l2 2m0 0l2-2m-2-2l-2 2m2.618-4.016A11.955 11.955 0 0112 2.944" />
                                </svg>
                            </div>
                            <p class="text-xs text-gray-500">Quantity</p>
                            <p class="font-semibold text-gray-800">${product.quantity}</p>
                        </div>
                        <div class="text-center">
                            <div class="flex justify-center mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                </svg>
                            </div>
                            <p class="text-xs text-gray-500">Value</p>
                            <p class="font-semibold text-gray-800">${product.value}</p>
                        </div>
                    </div>
                </div>
            `;
            productGrid.append(productCard);
        });
    }

    // Update metrics based on period
    function updateMetrics(period) {
        const data = dummyData[period];
        if (!data) return;
        
        const totalOutput = data.reduce((sum, item) => sum + parseInt(item.quantity), 0);
        const totalValue = data.reduce((sum, item) => {
            const value = parseInt(item.value.replace(/[$,]/g, ''));
            return sum + value;
        }, 0);
        
        $('#totalOutput').text(totalOutput.toLocaleString());
        $('#totalValue').text(`$${totalValue.toLocaleString()}`);
        $('#activeUnits').text(data.length);
    }

    // Initialize with daily data
    $(document).ready(function() {
        renderProductGrid(dummyData.daily);
        updateMetrics('daily');
        
        // Time period filter buttons
        $('#dailyBtn').click(function() {
            currentPeriod = 'daily';
            renderProductGrid(dummyData.daily);
            updateMetrics('daily');
            $('.px-4.py-1.text-sm.rounded-full.bg-white.border.border-gray-200').not('#customFilterBtn').removeClass('active-period');
            $(this).addClass('active-period');
        });
        
        $('#weeklyBtn').click(function() {
            currentPeriod = 'weekly';
            renderProductGrid(dummyData.weekly);
            updateMetrics('weekly');
            $('.px-4.py-1.text-sm.rounded-full.bg-white.border.border-gray-200').not('#customFilterBtn').removeClass('active-period');
            $(this).addClass('active-period');
        });
        
        $('#monthlyBtn').click(function() {
            currentPeriod = 'monthly';
            renderProductGrid(dummyData.monthly);
            updateMetrics('monthly');
            $('.px-4.py-1.text-sm.rounded-full.bg-white.border.border-gray-200').not('#customFilterBtn').removeClass('active-period');
            $(this).addClass('active-period');
        });

        // Custom filter dropdown
        $('#customFilterBtn').click(function(e) {
            e.stopPropagation();
            $('#filterDropdown').toggleClass('hidden');
        });

        // Close dropdown when clicking outside
        $(document).click(function(event) {
            if (!$(event.target).closest('#customFilterBtn, #filterDropdown').length) {
                $('#filterDropdown').addClass('hidden');
            }
        });

        // Tab switching for dropdown
        $('#monthTabBtn').click(function() {
            currentFilterType = 'month';
            $('#monthDropdownContent').removeClass('hidden');
            $('#dateRangeDropdownContent').addClass('hidden');
            $('.filter-tab-btn').removeClass('bg-green-100 text-green-800').addClass('text-gray-600 hover:bg-gray-50');
            $(this).removeClass('text-gray-600 hover:bg-gray-50').addClass('bg-green-100 text-green-800');
        });
        
        $('#dateRangeTabBtn').click(function() {
            currentFilterType = 'dateRange';
            $('#monthDropdownContent').addClass('hidden');
            $('#dateRangeDropdownContent').removeClass('hidden');
            $('.filter-tab-btn').removeClass('bg-green-100 text-green-800').addClass('text-gray-600 hover:bg-gray-50');
            $(this).removeClass('text-gray-600 hover:bg-gray-50').addClass('bg-green-100 text-green-800');
        });

        // Cancel custom filter
        $('#cancelCustomFilter').click(function() {
            $('#filterDropdown').addClass('hidden');
        });

        // Apply custom filter
        $('#applyCustomFilter').click(function() {
            if (currentFilterType === 'month') {
                const month = $('#monthSelectDropdown').val();
                const year = $('#yearSelectDropdown').val();
                currentFilter = { type: 'month', month, year };
                
                // Show success message
                alert(`Filter bulan ${$('#monthSelectDropdown option:selected').text()} ${year} telah diterapkan`);
            } else if (currentFilterType === 'dateRange') {
                const startDate = $('#startDateDropdown').val();
                const endDate = $('#endDateDropdown').val();
                
                if (startDate && endDate) {
                    if (new Date(startDate) > new Date(endDate)) {
                        alert('Tanggal mulai tidak boleh lebih besar dari tanggal selesai');
                        return;
                    }
                    
                    currentFilter = { type: 'dateRange', startDate, endDate };
                    alert(`Filter tanggal ${startDate} sampai ${endDate} telah diterapkan`);
                } else {
                    alert('Mohon isi tanggal mulai dan tanggal selesai');
                    return;
                }
            }
            
            $('#filterDropdown').addClass('hidden');
            
            // Highlight custom filter button temporarily
            $('#customFilterBtn').addClass('bg-blue-100 border-blue-300 text-blue-700');
            setTimeout(() => {
                $('#customFilterBtn').removeClass('bg-blue-100 border-blue-300 text-blue-700');
            }, 2000);
        });
    });
</script>
@endsection