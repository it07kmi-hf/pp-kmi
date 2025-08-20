@extends('layouts.dashboard')

@section('title', 'Report Buyer')
@section('page-title', 'Report Buyer Assembling')

@section('content')
<div class="space-y-6">
    <div class="container mx-auto px-6 py-8">
        <!-- Header -->
        <div class="flex justify-between items-start mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Report per Buyer</h1>
                <p class="text-gray-600">Analisis output produksi berdasarkan buyer</p>
            </div>
            
            <!-- Time Period Filter -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
                <select id="timePeriodFilter" class="px-4 py-2 border-0 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                    <option value="tahunan" selected>Tahunan</option>
                    <option value="harian">Harian</option>
                    <option value="mingguan">Mingguan</option>
                    <option value="bulanan">Bulanan</option>
                </select>
            </div>
        </div>

        <!-- Overview Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Overview Semua Buyer</h2>
                <p class="text-gray-600 text-sm mb-6">Perbandingan output value dan quantity per buyer</p>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Ranking Table -->
                    <div>
                        <h3 class="font-medium text-gray-700 mb-4">Ranking by Value</h3>
                        <div class="space-y-3">
                            <div id="buyerRankingList">
                                <!-- Dynamic content will be inserted here -->
                            </div>
                        </div>
                    </div>

                    <!-- Chart -->
                    <div>
                        <div class="h-80">
                            <canvas id="buyerOverviewChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Analysis Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">Detail Buyer Analysis</h2>
                        <p class="text-gray-600 text-sm">Pilih buyer untuk analisis mendalam</p>
                    </div>
                    
                    <!-- Buyer Selector -->
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
                        <select id="buyerSelector" class="px-4 py-2 border-0 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                            <option value="ETHAN ALLEN" selected>ETHAN ALLEN</option>
                            <option value="CRATE & BARREL">CRATE & BARREL</option>
                            <option value="CENTURY">CENTURY</option>
                            <option value="UTTERMOST">UTTERMOST</option>
                            <option value="VANGUARD">VANGUARD</option>
                            <option value="BRUNSWICK">BRUNSWICK</option>
                            <option value="CASEY">CASEY</option>
                            <option value="HICKORY">HICKORY</option>
                        </select>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <div class="flex items-center mb-2">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.51-1.31c-.562-.649-1.413-1.076-2.353-1.253V5z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Total Value</p>
                                <p id="selectedBuyerValue" class="text-2xl font-bold text-gray-800">$185,000</p>
                                <p id="selectedBuyerValueChange" class="text-sm text-green-600">+8.5% vs bulan lalu</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <div class="flex items-center mb-2">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 01-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Total Quantity</p>
                                <p id="selectedBuyerQty" class="text-2xl font-bold text-gray-800">295 Unit</p>
                                <p id="selectedBuyerRank" class="text-sm text-green-600">Ranking #1</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <div class="flex items-center mb-2">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Avg Order Value</p>
                                <p id="selectedBuyerAvg" class="text-2xl font-bold text-gray-800">$627</p>
                                <p class="text-sm text-gray-600">Per unit produksi</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="flex border-b border-gray-200 mb-6">
                    <button class="detail-tab-button px-6 py-3 font-medium text-gray-700 border-b-2 border-green-500 bg-green-50" data-tab="distribusiTab">Distribusi per Line</button>
                    <button class="detail-tab-button px-6 py-3 font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700" data-tab="productMixTab">Product Mix</button>
                    <button class="detail-tab-button px-6 py-3 font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700" data-tab="trendTab">Trend Analysis</button>
                </div>

                <!-- Tab Contents -->
                <div id="distribusiTab" class="detail-tab-content">
                    <h3 class="font-medium text-gray-700 mb-4">Distribusi Output per Assembling Line</h3>
                    <p id="distribusiSubtitle" class="text-sm text-gray-600 mb-4">Output ETHAN ALLEN per line assembling</p>
                    <div class="h-80">
                        <canvas id="assemblingLineChart"></canvas>
                    </div>
                </div>

                <div id="productMixTab" class="detail-tab-content hidden">
                    <h3 class="font-medium text-gray-700 mb-4">Product Mix Analysis</h3>
                    <p class="text-sm text-gray-600 mb-4">Komposisi produk per kategori</p>
                    <div class="h-80">
                        <canvas id="productMixChart"></canvas>
                    </div>
                </div>

                <div id="trendTab" class="detail-tab-content hidden">
                    <h3 class="font-medium text-gray-700 mb-4">Trend Analysis</h3>
                    <p class="text-sm text-gray-600 mb-4">Tren output dalam 6 bulan terakhir</p>
                    <div class="h-80">
                        <canvas id="trendChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- ✅ CDN Dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
$(document).ready(function() {
    // ✅ Complete Data Structure
    const buyerData = {
        tahunan: {
            'ETHAN ALLEN': {value: 185000, qty: 295, percentage: 37.0, rank: 1, change: '+8.5%'},
            'CRATE & BARREL': {value: 165000, qty: 278, percentage: 33.5, rank: 2, change: '+5.2%'},
            'CENTURY': {value: 142000, qty: 145, percentage: 28.5, rank: 3, change: '+12.1%'},
            'UTTERMOST': {value: 0, qty: 0, percentage: 0.0, rank: 4, change: '0%'},
            'VANGUARD': {value: 0, qty: 0, percentage: 0.0, rank: 5, change: '0%'},
            'BRUNSWICK': {value: 98000, qty: 180, percentage: 19.8, rank: 6, change: '+3.2%'},
            'CASEY': {value: 76000, qty: 120, percentage: 15.4, rank: 7, change: '-2.1%'},
            'HICKORY': {value: 45000, qty: 85, percentage: 9.1, rank: 8, change: '+7.8%'}
        },
        bulanan: {
            'ETHAN ALLEN': {value: 45000, qty: 75, percentage: 35.0, rank: 1, change: '+6.2%'},
            'CRATE & BARREL': {value: 38000, qty: 62, percentage: 29.5, rank: 2, change: '+4.1%'},
            'CENTURY': {value: 32000, qty: 48, percentage: 24.8, rank: 3, change: '+9.3%'},
            'UTTERMOST': {value: 15000, qty: 25, percentage: 11.6, rank: 4, change: '+15.2%'},
            'VANGUARD': {value: 12000, qty: 20, percentage: 9.3, rank: 5, change: '+8.7%'},
            'BRUNSWICK': {value: 28000, qty: 45, percentage: 21.7, rank: 6, change: '+2.8%'},
            'CASEY': {value: 18000, qty: 30, percentage: 14.0, rank: 7, change: '-1.5%'},
            'HICKORY': {value: 11000, qty: 18, percentage: 8.5, rank: 8, change: '+5.2%'}
        },
        mingguan: {
            'ETHAN ALLEN': {value: 12000, qty: 18, percentage: 38.0, rank: 1, change: '+3.1%'},
            'CRATE & BARREL': {value: 9500, qty: 15, percentage: 30.1, rank: 2, change: '+2.8%'},
            'CENTURY': {value: 8200, qty: 12, percentage: 26.0, rank: 3, change: '+4.5%'},
            'UTTERMOST': {value: 3500, qty: 6, percentage: 11.1, rank: 4, change: '+8.2%'},
            'VANGUARD': {value: 2800, qty: 5, percentage: 8.9, rank: 5, change: '+6.1%'},
            'BRUNSWICK': {value: 7000, qty: 11, percentage: 22.2, rank: 6, change: '+1.9%'},
            'CASEY': {value: 4200, qty: 7, percentage: 13.3, rank: 7, change: '-0.8%'},
            'HICKORY': {value: 2600, qty: 4, percentage: 8.2, rank: 8, change: '+3.7%'}
        },
        harian: {
            'ETHAN ALLEN': {value: 2200, qty: 3, percentage: 36.7, rank: 1, change: '+2.1%'},
            'CRATE & BARREL': {value: 1800, qty: 3, percentage: 30.0, rank: 2, change: '+1.5%'},
            'CENTURY': {value: 1500, qty: 2, percentage: 25.0, rank: 3, change: '+3.2%'},
            'UTTERMOST': {value: 800, qty: 1, percentage: 13.3, rank: 4, change: '+5.1%'},
            'VANGUARD': {value: 600, qty: 1, percentage: 10.0, rank: 5, change: '+4.2%'},
            'BRUNSWICK': {value: 1200, qty: 2, percentage: 20.0, rank: 6, change: '+0.8%'},
            'CASEY': {value: 900, qty: 1, percentage: 15.0, rank: 7, change: '-0.2%'},
            'HICKORY': {value: 500, qty: 1, percentage: 8.3, rank: 8, change: '+2.1%'}
        }
    };

    // ✅ Assembling line distribution data per buyer
    const assemblingLineData = {
        'ETHAN ALLEN': [45000, 52000, 38000, 50000],
        'CRATE & BARREL': [38000, 42000, 35000, 50000],
        'CENTURY': [32000, 35000, 28000, 47000],
        'UTTERMOST': [15000, 18000, 12000, 20000],
        'VANGUARD': [12000, 15000, 10000, 18000],
        'BRUNSWICK': [25000, 28000, 22000, 23000],
        'CASEY': [18000, 20000, 16000, 22000],
        'HICKORY': [11000, 12000, 9000, 13000]
    };

    // ✅ Product mix data per buyer
    const productMixData = {
        'ETHAN ALLEN': [45, 25, 20, 10],
        'CRATE & BARREL': [40, 30, 18, 12],
        'CENTURY': [50, 20, 15, 15],
        'UTTERMOST': [35, 35, 20, 10],
        'VANGUARD': [42, 28, 22, 8],
        'BRUNSWICK': [38, 32, 20, 10],
        'CASEY': [44, 26, 18, 12],
        'HICKORY': [46, 24, 16, 14]
    };

    // ✅ Trend data per buyer (6 months)
    const trendData = {
        'ETHAN ALLEN': [120000, 135000, 150000, 165000, 175000, 185000],
        'CRATE & BARREL': [110000, 125000, 140000, 150000, 160000, 165000],
        'CENTURY': [85000, 95000, 110000, 125000, 135000, 142000],
        'UTTERMOST': [20000, 25000, 18000, 15000, 8000, 0],
        'VANGUARD': [18000, 22000, 15000, 12000, 5000, 0],
        'BRUNSWICK': [65000, 72000, 78000, 85000, 92000, 98000],
        'CASEY': [50000, 58000, 62000, 68000, 72000, 76000],
        'HICKORY': [28000, 32000, 35000, 38000, 42000, 45000]
    };

    // Charts variables
    let overviewChart, assemblingChart, productMixChart, trendChart;

    // ✅ Initialize all charts
    function initializeCharts() {
        // Overview Chart
        const overviewCtx = document.getElementById('buyerOverviewChart').getContext('2d');
        overviewChart = new Chart(overviewCtx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    data: [],
                    backgroundColor: '#10B981',
                    borderRadius: 4,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { 
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    },
                    x: {
                        ticks: {
                            maxRotation: 45
                        }
                    }
                }
            }
        });

        // Assembling Line Chart
        const assemblingCtx = document.getElementById('assemblingLineChart').getContext('2d');
        assemblingChart = new Chart(assemblingCtx, {
            type: 'bar',
            data: {
                labels: ['Assembling 1', 'Assembling 2', 'Assembling 3', 'Assembling 4'],
                datasets: [{
                    data: [45000, 52000, 38000, 50000],
                    backgroundColor: '#10B981',
                    borderRadius: 4,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { 
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        // Product Mix Chart
        const productMixCtx = document.getElementById('productMixChart').getContext('2d');
        productMixChart = new Chart(productMixCtx, {
            type: 'doughnut',
            data: {
                labels: ['Furniture', 'Accessories', 'Lighting', 'Textiles'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: ['#10B981', '#3B82F6', '#F59E0B', '#EF4444'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Trend Chart
        const trendCtx = document.getElementById('trendChart').getContext('2d');
        trendChart = new Chart(trendCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Output Value',
                    data: [120000, 135000, 150000, 165000, 175000, 185000],
                    borderColor: '#10B981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { 
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    }

    // ✅ Update overview data based on time period
    function updateData(period) {
        const data = buyerData[period];
        const sortedBuyers = Object.entries(data)
            .filter(([name, info]) => info.value > 0)
            .sort((a, b) => b[1].value - a[1].value);

        // Update ranking list
        const rankingList = $('#buyerRankingList');
        rankingList.empty();

        sortedBuyers.forEach(([name, info], index) => {
            const rankingItem = $(`
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                            <span class="text-sm font-medium text-green-700">${index + 1}</span>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">${name}</p>
                            <p class="text-sm text-gray-600">${info.qty} unit</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-medium text-gray-800">$${info.value.toLocaleString()}</p>
                        <p class="text-sm text-gray-600">${info.percentage}%</p>
                    </div>
                </div>
            `);
            rankingList.append(rankingItem);
        });

        // Update overview chart
        overviewChart.data.labels = sortedBuyers.map(([name]) => name);
        overviewChart.data.datasets[0].data = sortedBuyers.map(([, info]) => info.value);
        overviewChart.update();
    }

    // ✅ Update selected buyer details
    function updateSelectedBuyer(buyerName) {
        const period = $('#timePeriodFilter').val();
        const data = buyerData[period][buyerName];
        
        if (!data) return;

        // Update stats cards
        $('#selectedBuyerValue').text(`$${data.value.toLocaleString()}`);
        $('#selectedBuyerValueChange').text(`${data.change} vs bulan lalu`);
        $('#selectedBuyerQty').text(`${data.qty} Unit`);
        $('#selectedBuyerRank').text(`Ranking #${data.rank}`);
        
        const avgOrderValue = data.qty > 0 ? Math.round(data.value / data.qty) : 0;
        $('#selectedBuyerAvg').text(`$${avgOrderValue}`);

        // Update distribusi subtitle
        $('#distribusiSubtitle').text(`Output ${buyerName} per line assembling`);

        // Update assembling line chart
        if (assemblingLineData[buyerName]) {
            assemblingChart.data.datasets[0].data = assemblingLineData[buyerName];
            assemblingChart.update();
        }

        // Update product mix chart
        if (productMixData[buyerName]) {
            productMixChart.data.datasets[0].data = productMixData[buyerName];
            productMixChart.update();
        }

        // Update trend chart
        if (trendData[buyerName]) {
            trendChart.data.datasets[0].data = trendData[buyerName];
            trendChart.data.datasets[0].label = `${buyerName} Output Trend`;
            trendChart.update();
        }
    }

    // ✅ Tab switching function
    function switchDetailTab(tabName) {
        // Reset all tabs
        $('.detail-tab-button').removeClass('border-green-500 bg-green-50 text-gray-700')
                              .addClass('text-gray-500 border-transparent');

        // Activate selected tab
        $(`[data-tab="${tabName}"]`).addClass('border-green-500 bg-green-50 text-gray-700')
                                   .removeClass('text-gray-500 border-transparent');

        // Hide all tab contents
        $('.detail-tab-content').addClass('hidden');

        // Show selected tab content
        $(`#${tabName}`).removeClass('hidden');

        // Resize charts when switching tabs
        setTimeout(() => {
            if (tabName === 'distribusiTab' && assemblingChart) assemblingChart.resize();
            if (tabName === 'productMixTab' && productMixChart) productMixChart.resize();
            if (tabName === 'trendTab' && trendChart) trendChart.resize();
        }, 100);
    }

    // ✅ Initialize everything
    initializeCharts();
    updateData('tahunan');
    updateSelectedBuyer('ETHAN ALLEN');

    // ✅ Event listeners
    $('#timePeriodFilter').on('change', function() {
        updateData(this.value);
        updateSelectedBuyer($('#buyerSelector').val());
    });

    $('#buyerSelector').on('change', function() {
        updateSelectedBuyer(this.value);
    });

    // ✅ Tab system event handlers
    $('.detail-tab-button').on('click', function() {
        switchDetailTab($(this).data('tab'));
    });
});
</script>
@endpush