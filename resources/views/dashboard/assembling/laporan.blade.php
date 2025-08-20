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
                <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
                    <option>Harian</option>
                    <option>Mingguan</option>
                    <option>Bulanan</option>
                    <option>Tahunan</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Line:</label>
                <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
                    <option>Assembling 1</option>
                    <option>Assembling 2</option>
                    <option>Assembling 3</option>
                    <option>Assembling 4</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal:</label>
                <input type="date" value="2025-08-20" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-600">Output Produk</p>
                    <p class="text-2xl font-bold text-green-600">$6,368,123</p>
                    <p class="text-xs text-green-600 mt-1">+6.9% vs periode sebelumnya</p>
                </div>
                <i class="fas fa-arrow-up text-green-600"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-600">Total Periode</p>
                    <p class="text-2xl font-bold text-green-600">$38,577,726,738</p>
                    <p class="text-xs text-gray-600 mt-1">Akumulasi seluruh periode</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-600">Rata-rata</p>
                    <p class="text-2xl font-bold text-green-600">$6,429,621,123</p>
                    <p class="text-xs text-gray-600 mt-1">Per bulan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <div class="mb-6 border-b border-gray-200">
        <nav class="flex space-x-4">
            <button class="tab-button py-2 px-3 text-sm font-medium text-green-700 bg-green-50 border-b-2 border-green-700 rounded-t-lg">Trend Analysis</button>
            <button class="tab-button py-2 px-3 text-sm font-medium text-gray-600 hover:text-gray-900 border-b-2 border-transparent hover:border-gray-300">Perbandingan Line</button>
            <button class="tab-button py-2 px-3 text-sm font-medium text-gray-600 hover:text-gray-900 border-b-2 border-transparent hover:border-gray-300">Breakdown Detail</button>
        </nav>
    </div>

    <!-- Chart -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h4 class="text-sm font-medium text-green-700 mb-2">Trend Output Bulanan</h4>
        <p class="text-xs text-gray-600 mb-4">Tren output value assembling3</p>
        <div class="h-80">
            <canvas id="trendChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function () {
        // Initialize Chart
        const ctx = document.getElementById('trendChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt'],
                datasets: [{
                    label: 'Output Value',
                    data: [650000, 620000, 640000, 650000, 630000, 640000],
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
    });
</script>
@endsection