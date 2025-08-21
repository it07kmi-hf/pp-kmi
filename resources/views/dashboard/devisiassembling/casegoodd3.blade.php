@extends('layouts.dashboard')
@section('title', 'Dashboard Casegood D3 - Assembling')
@section('page-title', 'Dashboard Monitoring Casegood D3')
@section('content')
<style>
    .card-shadow {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    .tab-active {
        background-color: #6B7280;
        color: white;
    }
    .filter-tab-btn.active {
        background-color: #10B981;
        color: white;
        border-color: #10B981;
    }
    .filter-tab-btn {
        transition: all 0.2s ease;
    }
</style>

<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Casegood D3 - Detail Produksi</h1>
            <p class="text-gray-600">Divisi Assembling - PT. KAYUMEBEL INDONESIA</p>
        </div>
        <div class="text-right">
            <p class="text-sm text-gray-500" id="period-info">Data harian</p>
        </div>
    </div>

    <!-- Period Monitoring Section -->
    <div class="bg-white rounded-lg card-shadow p-4 mb-6 flex justify-between items-center">
        <div class="flex items-center">
            <i class="far fa-calendar-alt mr-2 text-gray-500"></i>
            <span class="font-medium text-gray-700">Periode Monitoring</span>
        </div>
        
        <div class="flex items-center space-x-2">
            <button class="period-btn px-4 py-1 rounded-full tab-active text-sm font-medium" data-period="harian">Harian</button>
            <button class="period-btn px-4 py-1 rounded-full text-gray-600 text-sm font-medium hover:bg-gray-100" data-period="mingguan">Mingguan</button>
            <button class="period-btn px-4 py-1 rounded-full text-gray-600 text-sm font-medium hover:bg-gray-100" data-period="bulanan">Bulanan</button>
            
            <div class="relative ml-4">
                <button id="custom-filter-btn" class="px-3 py-1 rounded-md border border-gray-300 text-gray-600 text-sm flex items-center hover:bg-gray-50">
                    <i class="fas fa-filter mr-1"></i>
                    Filter Periode Khusus
                </button>
                
                <!-- Custom Filter Dropdown -->
                <div id="custom-filter-dropdown" class="absolute right-0 top-full mt-2 w-80 bg-white rounded-lg shadow-lg border border-gray-200 z-50" style="display: none;">
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-800 mb-2">Filter Periode Khusus</h3>
                        <p class="text-sm text-gray-600 mb-4">Analisa data periode tertentu</p>
                        
                        <!-- Filter Type Tabs -->
                        <div class="flex mb-4">
                            <button id="bulan-spesifik-tab" class="filter-tab-btn px-4 py-2 text-sm font-medium rounded-l-lg border border-gray-300 bg-green-100 text-green-800">
                                Bulan Spesifik
                            </button>
                            <button id="range-tanggal-tab" class="filter-tab-btn px-4 py-2 text-sm font-medium rounded-r-lg border border-gray-300 border-l-0 text-gray-600 hover:bg-gray-50">
                                Range Tanggal
                            </button>
                        </div>
                        
                        <!-- Bulan Spesifik Content -->
                        <div id="bulan-spesifik-content" class="filter-content">
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Bulan</label>
                                    <select id="month-select" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08" selected>Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tahun</label>
                                    <select id="year-select" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm">
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025" selected>2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Range Tanggal Content -->
                        <div id="range-tanggal-content" class="filter-content" style="display: none;">
                            <div class="space-y-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                                    <input type="date" id="start-date-range" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Akhir</label>
                                    <input type="date" id="end-date-range" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-2 pt-4 border-t border-gray-200">
                            <button id="cancel-custom-filter" class="px-4 py-2 text-gray-600 text-sm hover:bg-gray-50 rounded-md">Batal</button>
                            <button id="apply-custom-filter" class="px-4 py-2 bg-green-500 text-white text-sm rounded-md hover:bg-green-600">Terapkan Filter</button>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="text-3xl font-bold text-gray-800 mb-1" id="unit-output">268</div>
            <div class="text-sm text-gray-500" id="unit-output-label">pieces (Harian)</div>
        </div>
        <!-- Unit Value Card -->
        <div class="bg-white rounded-lg card-shadow p-6">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-gray-600 font-medium">Unit Value</h3>
                <i class="fas fa-dollar-sign text-gray-400"></i>
            </div>
            <div class="text-3xl font-bold text-gray-800 mb-1" id="unit-value">$13,400</div>
            <div class="text-sm text-gray-500" id="unit-value-label">USD (Harian)</div>
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
            <span class="font-medium text-gray-700">Detail Work Center - Casegood D3</span>
            <span class="ml-2 px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full" id="period-badge">Harian</span>
        </div>
        
        <!-- Work Center Item -->
        <div class="border-b pb-4 mb-4">
            <div class="flex items-center justify-between cursor-pointer" id="casegood-toggle">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-chevron-right text-green-600"></i>
                    </div>
                    <div>
                        <div class="flex items-center">
                            <i class="fas fa-box mr-2 text-gray-500"></i>
                            <span class="font-medium">Casegood D3</span>
                            <span class="ml-2 text-sm text-gray-500">6 Work Centers</span>
                        </div>
                    </div>
                </div>
                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full" id="summary-period-badge">Harian</span>
            </div>
            
            <!-- Summary Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-cube text-green-500 mr-2"></i>
                        <span class="text-gray-600">Total Quantity</span>
                    </div>
                    <div class="text-xl font-bold text-gray-800" id="total-quantity">268 pcs</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-dollar-sign text-green-500 mr-2"></i>
                        <span class="text-gray-600">Total Value</span>
                    </div>
                    <div class="text-xl font-bold text-gray-800" id="total-value">$13,400</div>
                </div>
            </div>
            
            <!-- Work Center Details -->
            <div id="work-centers-details" style="display: none;">
                <div id="work-centers-container" class="mt-6">
                    <!-- Work centers akan di-generate oleh JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Data dummy untuk berbagai periode
    const periodData = {
        harian: {
            unitOutput: 268,
            unitValue: 13400,
            workCenters: [
                { id: 'D1-WC01', name: 'Work Center 01', operator: 'Budi Santoso', quantity: 45, value: 2250 },
                { id: 'D1-WC02', name: 'Work Center 02', operator: 'Siti Nurhaliza', quantity: 38, value: 1900 },
                { id: 'D1-WC03', name: 'Work Center 03', operator: 'Ahmad Yani', quantity: 42, value: 2100 },
                { id: 'D1-WC04', name: 'Work Center 04', operator: 'Rina Susanti', quantity: 39, value: 1950 },
                { id: 'D1-WC05', name: 'Work Center 05', operator: 'Joko Widodo', quantity: 41, value: 2050 },
                { id: 'D1-WC06', name: 'Work Center 06', operator: 'Ani Rahayu', quantity: 43, value: 2150 }
            ]
        },
        mingguan: {
            unitOutput: 1876,
            unitValue: 93800,
            workCenters: [
                { id: 'D1-WC01', name: 'Work Center 01', operator: 'Budi Santoso', quantity: 315, value: 15750 },
                { id: 'D1-WC02', name: 'Work Center 02', operator: 'Siti Nurhaliza', quantity: 266, value: 13300 },
                { id: 'D1-WC03', name: 'Work Center 03', operator: 'Ahmad Yani', quantity: 294, value: 14700 },
                { id: 'D1-WC04', name: 'Work Center 04', operator: 'Rina Susanti', quantity: 273, value: 13650 },
                { id: 'D1-WC05', name: 'Work Center 05', operator: 'Joko Widodo', quantity: 287, value: 14350 },
                { id: 'D1-WC06', name: 'Work Center 06', operator: 'Ani Rahayu', quantity: 301, value: 15050 }
            ]
        },
        bulanan: {
            unitOutput: 8040,
            unitValue: 402000,
            workCenters: [
                { id: 'D1-WC01', name: 'Work Center 01', operator: 'Budi Santoso', quantity: 1350, value: 67500 },
                { id: 'D1-WC02', name: 'Work Center 02', operator: 'Siti Nurhaliza', quantity: 1140, value: 57000 },
                { id: 'D1-WC03', name: 'Work Center 03', operator: 'Ahmad Yani', quantity: 1260, value: 63000 },
                { id: 'D1-WC04', name: 'Work Center 04', operator: 'Rina Susanti', quantity: 1170, value: 58500 },
                { id: 'D1-WC05', name: 'Work Center 05', operator: 'Joko Widodo', quantity: 1230, value: 61500 },
                { id: 'D1-WC06', name: 'Work Center 06', operator: 'Ani Rahayu', quantity: 1290, value: 64500 }
            ]
        }
    };

    // Data dummy untuk bulan spesifik
    const monthlyData = {
        '2025-01': { unitOutput: 7890, unitValue: 394500 },
        '2025-02': { unitOutput: 7234, unitValue: 361700 },
        '2025-03': { unitOutput: 8456, unitValue: 422800 },
        '2025-04': { unitOutput: 7823, unitValue: 391150 },
        '2025-05': { unitOutput: 8190, unitValue: 409500 },
        '2025-06': { unitOutput: 7967, unitValue: 398350 },
        '2025-07': { unitOutput: 8340, unitValue: 417000 },
        '2025-08': { unitOutput: 8040, unitValue: 402000 },
        '2025-09': { unitOutput: 7756, unitValue: 387800 },
        '2025-10': { unitOutput: 8234, unitValue: 411700 },
        '2025-11': { unitOutput: 7890, unitValue: 394500 },
        '2025-12': { unitOutput: 8567, unitValue: 428350 }
    };

    let currentPeriod = 'harian';
    let customDateRange = null;
    let currentFilterType = 'bulan-spesifik';

    $(document).ready(function() {
        // Toggle work centers detail (kode yang sudah ada)
        $('#casegood-toggle').click(function() {
            var detailsElement = $('#work-centers-details');
            var iconElement = $(this).find('i');
            
            if (detailsElement.is(':visible')) {
                detailsElement.slideUp();
                iconElement.removeClass('fa-chevron-down').addClass('fa-chevron-right');
            } else {
                detailsElement.slideDown();
                iconElement.removeClass('fa-chevron-right').addClass('fa-chevron-down');
            }
        });

        // Event handler untuk tombol periode
        $('.period-btn').click(function() {
            const period = $(this).data('period');
            selectPeriod(period);
        });

        // Event handler untuk filter periode khusus
        $('#custom-filter-btn').click(function(e) {
            e.stopPropagation();
            $('#custom-filter-dropdown').toggle();
        });

        // Event handler untuk tab filter
        $('.filter-tab-btn').click(function() {
            const tabId = $(this).attr('id');
            currentFilterType = tabId.replace('-tab', '');
            
            // Update tab appearance
            $('.filter-tab-btn').removeClass('bg-green-100 text-green-800').addClass('text-gray-600 hover:bg-gray-50');
            $(this).removeClass('text-gray-600 hover:bg-gray-50').addClass('bg-green-100 text-green-800');
            
            // Show/hide content
            $('.filter-content').hide();
            $('#' + currentFilterType + '-content').show();
        });

        // Event handler untuk apply custom filter
        $('#apply-custom-filter').click(function() {
            if (currentFilterType === 'bulan-spesifik') {
                const month = $('#month-select').val();
                const year = $('#year-select').val();
                const monthKey = year + '-' + month;
                
                if (monthlyData[monthKey]) {
                    const monthNames = {
                        '01': 'Januari', '02': 'Februari', '03': 'Maret', '04': 'April',
                        '05': 'Mei', '06': 'Juni', '07': 'Juli', '08': 'Agustus',
                        '09': 'September', '10': 'Oktober', '11': 'November', '12': 'Desember'
                    };
                    
                    customDateRange = {
                        type: 'monthly',
                        key: monthKey,
                        label: `${monthNames[month]} ${year}`
                    };
                    
                    selectPeriod('custom');
                    $('#custom-filter-dropdown').hide();
                }
            } else if (currentFilterType === 'range-tanggal') {
                const startDate = $('#start-date-range').val();
                const endDate = $('#end-date-range').val();
                
                if (startDate && endDate) {
                    if (new Date(startDate) > new Date(endDate)) {
                        alert('Tanggal mulai tidak boleh lebih besar dari tanggal selesai');
                        return;
                    }
                    
                    customDateRange = {
                        type: 'range',
                        start: startDate,
                        end: endDate,
                        label: `${new Date(startDate).toLocaleDateString('id-ID')} - ${new Date(endDate).toLocaleDateString('id-ID')}`
                    };
                    
                    selectPeriod('custom');
                    $('#custom-filter-dropdown').hide();
                } else {
                    alert('Mohon isi tanggal mulai dan tanggal selesai');
                }
            }
        });

        // Event handler untuk cancel custom filter
        $('#cancel-custom-filter').click(function() {
            $('#custom-filter-dropdown').hide();
        });

        // Close dropdown ketika klik di luar
        $(document).click(function(event) {
            if (!$(event.target).closest('#custom-filter-btn, #custom-filter-dropdown').length) {
                $('#custom-filter-dropdown').hide();
            }
        });

        // Initialize dengan data harian
        updateData(currentPeriod);
    });

    function selectPeriod(period) {
        // Update active button
        $('.period-btn').removeClass('tab-active').addClass('text-gray-600');
        
        if (period !== 'custom') {
            $(`.period-btn[data-period="${period}"]`).removeClass('text-gray-600').addClass('tab-active');
        } else {
            // Untuk custom period, highlight tombol filter
            $('#custom-filter-btn').addClass('bg-blue-100 border-blue-300 text-blue-700');
            setTimeout(() => {
                $('#custom-filter-btn').removeClass('bg-blue-100 border-blue-300 text-blue-700');
            }, 2000);
        }
        
        currentPeriod = period;
        updateData(period);
    }

    function updateData(period) {
        let data;
        let periodLabel;
        
        if (period === 'custom' && customDateRange) {
            if (customDateRange.type === 'monthly') {
                // Data untuk bulan spesifik
                const monthData = monthlyData[customDateRange.key];
                const baseMonthly = periodData.bulanan;
                
                data = {
                    unitOutput: monthData.unitOutput,
                    unitValue: monthData.unitValue,
                    workCenters: baseMonthly.workCenters.map(wc => ({
                        ...wc,
                        quantity: Math.round(wc.quantity * (monthData.unitOutput / baseMonthly.unitOutput)),
                        value: Math.round(wc.value * (monthData.unitValue / baseMonthly.unitValue))
                    }))
                };
                
                periodLabel = customDateRange.label;
            } else if (customDateRange.type === 'range') {
                // Data untuk range tanggal
                const days = Math.ceil((new Date(customDateRange.end) - new Date(customDateRange.start)) / (1000 * 60 * 60 * 24)) + 1;
                const baseDaily = periodData.harian;
                
                data = {
                    unitOutput: Math.round(baseDaily.unitOutput * days * (0.8 + Math.random() * 0.4)),
                    unitValue: Math.round(baseDaily.unitValue * days * (0.8 + Math.random() * 0.4)),
                    workCenters: baseDaily.workCenters.map(wc => ({
                        ...wc,
                        quantity: Math.round(wc.quantity * days * (0.8 + Math.random() * 0.4)),
                        value: Math.round(wc.value * days * (0.8 + Math.random() * 0.4))
                    }))
                };
                
                periodLabel = customDateRange.label;
            }
        } else {
            data = periodData[period];
            periodLabel = period.charAt(0).toUpperCase() + period.slice(1);
        }
        
        // Update stats cards
        $('#unit-output').text(data.unitOutput.toLocaleString());
        $('#unit-value').text('$' + data.unitValue.toLocaleString());
        $('#unit-output-label').text(`pieces (${periodLabel})`);
        $('#unit-value-label').text(`USD (${periodLabel})`);
        
        // Update summary
        $('#total-quantity').text(data.unitOutput.toLocaleString() + ' pcs');
        $('#total-value').text('$' + data.unitValue.toLocaleString());
        
        // Update badges
        $('#period-badge, #summary-period-badge').text(periodLabel);
        $('#period-info').text(`Data ${period === 'custom' ? 'periode khusus' : period}`);
        
        // Update work centers
        updateWorkCenters(data.workCenters);
    }

    function updateWorkCenters(workCenters) {
        const container = $('#work-centers-container');
        container.empty();
        
        workCenters.forEach((wc, index) => {
            const workCenterHtml = `
                <div class="bg-green-50 rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            <span class="font-medium">${wc.name}</span>
                        </div>
                        <span class="text-sm text-gray-500">${wc.id}</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <i class="fas fa-user mr-2 text-gray-500"></i>
                        <span class="text-gray-700">${wc.operator}</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Quantity</div>
                            <div class="text-lg font-semibold">${wc.quantity.toLocaleString()} pcs</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Value</div>
                            <div class="text-lg font-semibold">$${wc.value.toLocaleString()}</div>
                        </div>
                    </div>
                </div>
            `;
            container.append(workCenterHtml);
        });
    }
</script>
@endsection