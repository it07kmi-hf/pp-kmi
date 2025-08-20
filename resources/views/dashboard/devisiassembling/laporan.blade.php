@extends('layouts.dashboard')

@section('title', 'Laporan Periode')
@section('page-title', 'Laporan Periode')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-green-700">Laporan Periode</h1>
            <p class="text-gray-600 mt-1">Laporan output produksi berdasarkan periode waktu</p>
        </div>
        <div class="flex space-x-2">
            <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg flex items-center space-x-1 transition-colors">
                <i class="fas fa-file-pdf"></i>
                <span>PDF</span>
            </button>
            <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg flex items-center space-x-1 transition-colors">
                <i class="fas fa-file-excel"></i>
                <span>Excel</span>
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Periode:</label>
                <select id="periode" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
                    <option value="harian">Harian</option>
                    <option value="mingguan" selected>Mingguan</option>
                    <option value="bulanan">Bulanan</option>
                    <option value="tahunan">Tahunan</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Line:</label>
                <select id="line" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
                    <option value="all" selected>Semua Line</option>
                    <option value="assembling1">Assembling 1</option>
                    <option value="assembling2">Assembling 2</option>
                    <option value="assembling3">Assembling 3</option>
                    <option value="assembling4">Assembling 4</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal:</label>
                <input type="date" id="tanggal" value="2025-08-20" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-600">Output Produk</p>
                    <p id="output-produk" class="text-2xl font-bold text-green-600">$6,368,123</p>
                    <p class="text-xs text-green-600 mt-1">+6.9% vs periode sebelumnya</p>
                </div>
                <i class="fas fa-arrow-up text-green-600"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-600">Total Periode</p>
                    <p id="total-periode" class="text-2xl font-bold text-green-600">$38,577,726,738</p>
                    <p class="text-xs text-gray-600 mt-1">Akumulasi seluruh periode</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-600">Rata-rata</p>
                    <p id="rata-rata" class="text-2xl font-bold text-green-600">$6,429,621,123</p>
                    <p class="text-xs text-gray-600 mt-1">Per bulan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <div class="mb-6 border-b border-gray-200">
        <nav class="flex space-x-4">
            <button id="tab-trend" class="tab-button py-2 px-3 text-sm font-medium active rounded-t-lg border-b-2">Trend Analysis</button>
            <button id="tab-comparison" class="tab-button py-2 px-3 text-sm font-medium text-gray-600 hover:text-gray-900 border-b-2 border-transparent hover:border-gray-300 rounded-t-lg">Perbandingan Line</button>
            <button id="tab-breakdown" class="tab-button py-2 px-3 text-sm font-medium text-gray-600 hover:text-gray-900 border-b-2 border-transparent hover:border-gray-300 rounded-t-lg">Breakdown Detail</button>
        </nav>
    </div>

    <!-- Chart Containers -->
    <!-- Trend Analysis -->
    <div id="trend-container" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h4 class="text-sm font-medium text-green-700 mb-2">Trend Output Bulanan</h4>
        <p class="text-xs text-gray-600 mb-4">Tren output value assembling</p>
        <div class="chart-container">
            <canvas id="trendChart"></canvas>
        </div>
    </div>

    <!-- Perbandingan Line -->
    <div id="comparison-container" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6" style="display: none;">
        <h4 class="text-sm font-medium text-green-700 mb-2">Perbandingan Output per Assembling Line</h4>
        <p class="text-xs text-gray-600 mb-4">Perbandingan output semua line assembling</p>
        <div class="chart-container">
            <canvas id="comparisonChart"></canvas>
        </div>
    </div>

    <!-- Breakdown Detail -->
    <div id="breakdown-container" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6" style="display: none;">
        <h4 class="text-sm font-medium text-green-700 mb-2">Detail Breakdown</h4>
        <p class="text-xs text-gray-600 mb-4">Data detail per periode dengan metrics kinerja</p>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Minggu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assembling 1</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assembling 2</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assembling 3</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assembling 4</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    </tr>
                </thead>
                <tbody id="breakdown-table" class="bg-white divide-y divide-gray-200">
                    <!-- Data will be populated by JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Data dummy
    const dummyData = {
        mingguan: {
            labels: ['W3', 'W4', 'W5', 'W6', 'W7', 'W8', 'W9', 'W10', 'W11', 'W12'],
            trend: [650000, 620000, 640000, 650000, 630000, 640000, 580000, 620000, 610000, 650000],
            assembling1: [386858, 428077, 398311, 431503, 433219, 431937, 354894, 418689, 396274, 398271],
            assembling2: [381680, 403533, 423100, 439212, 458072, 388177, 403258, 416371, 430064, 498173],
            assembling3: [337182, 378093, 357330, 343410, 357388, 333442, 324487, 392951, 370244, 346821],
            assembling4: [365929, 398617, 413408, 444811, 389092, 434090, 379186, 378776, 362372, 368827]
        },
        bulanan: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            trend: [2800000, 2650000, 2900000, 3100000, 2950000, 3200000],
            assembling1: [1580000, 1490000, 1650000, 1780000, 1690000, 1820000],
            assembling2: [1620000, 1530000, 1720000, 1850000, 1750000, 1880000],
            assembling3: [1450000, 1380000, 1550000, 1680000, 1590000, 1710000],
            assembling4: [1560000, 1470000, 1630000, 1760000, 1670000, 1790000]
        },
        harian: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            trend: [95000, 98000, 102000, 89000, 96000, 78000, 0],
            assembling1: [42000, 44000, 46000, 40000, 43000, 35000, 0],
            assembling2: [43000, 45000, 47000, 41000, 44000, 36000, 0],
            assembling3: [38000, 40000, 42000, 36000, 39000, 32000, 0],
            assembling4: [41000, 43000, 45000, 39000, 42000, 34000, 0]
        }
    };

    let trendChart, comparisonChart;

    $(document).ready(function() {
        // Initialize charts
        initializeTrendChart();
        initializeComparisonChart();
        
        // Load initial data
        updateData();
        
        // Event listeners for filters
        $('#periode, #line, #tanggal').on('change', function() {
            updateData();
        });

        // Tab switching
        $('.tab-button').on('click', function() {
            const tabId = $(this).attr('id');
            switchTab(tabId);
        });
    });

    function initializeTrendChart() {
        const ctx = document.getElementById('trendChart').getContext('2d');
        trendChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Output Value',
                    data: [],
                    borderColor: '#10B981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#10B981',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        ticks: {
                            callback: function(value) {
                                return '$' + (value / 1000) + 'k';
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    function initializeComparisonChart() {
        const ctx = document.getElementById('comparisonChart').getContext('2d');
        comparisonChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Assembling 1',
                        data: [],
                        backgroundColor: '#10B981',
                        borderColor: '#10B981',
                        borderWidth: 1
                    },
                    {
                        label: 'Assembling 2',
                        data: [],
                        backgroundColor: '#3B82F6',
                        borderColor: '#3B82F6',
                        borderWidth: 1
                    },
                    {
                        label: 'Assembling 3',
                        data: [],
                        backgroundColor: '#8B5CF6',
                        borderColor: '#8B5CF6',
                        borderWidth: 1
                    },
                    {
                        label: 'Assembling 4',
                        data: [],
                        backgroundColor: '#F59E0B',
                        borderColor: '#F59E0B',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + (value / 1000) + 'k';
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    }

    function updateData() {
        const periode = $('#periode').val();
        const line = $('#line').val();
        const data = dummyData[periode];

        // Update trend chart
        if (line === 'all') {
            trendChart.data.labels = data.labels;
            trendChart.data.datasets[0].data = data.trend;
        } else {
            trendChart.data.labels = data.labels;
            trendChart.data.datasets[0].data = data[line];
        }
        trendChart.update();

        // Update comparison chart
        comparisonChart.data.labels = data.labels;
        comparisonChart.data.datasets[0].data = data.assembling1;
        comparisonChart.data.datasets[1].data = data.assembling2;
        comparisonChart.data.datasets[2].data = data.assembling3;
        comparisonChart.data.datasets[3].data = data.assembling4;
        comparisonChart.update();

        // Update breakdown table
        updateBreakdownTable(data);

        // Update summary cards
        updateSummaryCards(data);
    }

    function updateBreakdownTable(data) {
        const tableBody = $('#breakdown-table');
        tableBody.empty();

        data.labels.forEach((label, index) => {
            const ass1 = data.assembling1[index];
            const ass2 = data.assembling2[index];
            const ass3 = data.assembling3[index];
            const ass4 = data.assembling4[index];
            const total = ass1 + ass2 + ass3 + ass4;

            const row = `
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${label}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">$${ass1.toLocaleString()}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">$${ass2.toLocaleString()}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">$${ass3.toLocaleString()}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">$${ass4.toLocaleString()}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-green-600">$${total.toLocaleString()}</td>
                </tr>
            `;
            tableBody.append(row);
        });
    }

    function updateSummaryCards(data) {
        const periode = $('#periode').val();
        const line = $('#line').val();
        
        let outputData = line === 'all' ? data.trend : data[line];
        const currentOutput = outputData[outputData.length - 1];
        const totalOutput = outputData.reduce((sum, val) => sum + val, 0);
        const avgOutput = totalOutput / outputData.length;

        $('#output-produk').text('$' + currentOutput.toLocaleString());
        $('#total-periode').text('$' + totalOutput.toLocaleString());
        $('#rata-rata').text('$' + Math.round(avgOutput).toLocaleString());
    }

    function switchTab(tabId) {
        // Remove active class from all tabs
        $('.tab-button').removeClass('active').addClass('text-gray-600');
        
        // Add active class to clicked tab
        $('#' + tabId).removeClass('text-gray-600').addClass('active');

        // Hide all containers
        $('#trend-container, #comparison-container, #breakdown-container').hide();

        // Show selected container
        switch(tabId) {
            case 'tab-trend':
                $('#trend-container').show();
                break;
            case 'tab-comparison':
                $('#comparison-container').show();
                break;
            case 'tab-breakdown':
                $('#breakdown-container').show();
                break;
        }
    }
</script>
@endsection