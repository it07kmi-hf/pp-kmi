@extends('layouts.dashboard')

@section('title', 'Dashboard Assembling')
@section('page-title', 'Dashboard Monitoring Assembling')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Dashboard Monitoring Assembling</h1>
            <p class="text-gray-500">Overview produksi hari ini - 19/8/2025</p>
        </div>
        <div class="bg-gray-50 rounded-lg shadow px-6 py-3">
            <h3 class="text-sm font-medium text-gray-500">Total Target Harian</h3>
            <p class="text-lg font-bold text-gray-900">$1,200,000</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Output Value -->
        <div class="bg-white rounded-lg shadow p-6 relative overflow-hidden">
            <!-- Simbol dolar di pojok kanan atas -->
            <div class="absolute top-2 right-3 text-gray-400 font-bold">$</div>
            
            <h3 class="text-sm font-medium text-gray-500">Total Output Value</h3>
            <p class="text-2xl font-bold text-gray-900">1,353,400</p>

            <!-- Progress Bar -->
            <div class="w-full bg-gray-200 h-2 rounded-full mt-3 overflow-hidden">
                <div class="bg-black h-2 rounded-full" style="width: 100%"></div>
            </div>

            <p class="text-sm text-gray-600 mt-2">112.8% dari target</p>
        </div>

        <!-- Total Quantity -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-sm font-medium text-gray-500">Total Quantity</h3>
            <p class="text-2xl font-bold text-gray-900">2,174 unit</p>
            <p class="text-sm text-green-600 mt-2">↑ +5.2% dari kemarin</p>
        </div>

        <!-- Lines On Target -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-sm font-medium text-gray-500">Lines On Target</h3>
            <p class="text-2xl font-bold text-gray-900">3/4</p>
            <div class="flex space-x-1 mt-2">
                <div class="w-6 h-4 rounded bg-green-500"></div>
                <div class="w-6 h-4 rounded bg-green-500"></div>
                <div class="w-6 h-4 rounded bg-green-500"></div>
                <div class="w-6 h-4 rounded bg-gray-300"></div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Trend Output Mingguan -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold text-gray-800">Trend Output Mingguan</h2>
            <p class="text-sm text-gray-500 mb-4">Output value dan quantity per hari</p>
            <div class="h-72">
                <canvas id="trendChart"></canvas>
            </div>
        </div>

        <!-- Distribusi Output per Buyer -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold text-gray-800">Distribusi Output per Buyer</h2>
            <p class="text-sm text-gray-500 mb-4">Breakdown output berdasarkan buyer</p>
            <div class="h-72">
                <canvas id="buyerChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Performance per Assembling Line -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Performance per Assembling Line</h2>
            <p class="text-sm text-gray-500">Target vs actual output untuk setiap line produksi</p>
        </div>
        <div class="p-6 space-y-6">
            <!-- Contoh Line -->
            <div>
                <div class="flex justify-between mb-2">
                    <span class="font-medium">Assembling Line 1</span>
                    <span class="text-sm text-gray-500">$309,900 / $300,000<br>503 unit</span>
                </div>
                <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                    <div class="bg-black h-2 rounded-full" style="width: 100%"></div>
                </div>
                <p class="text-sm text-green-600 mt-1">103.3% dari target - Target Tercapai</p>
            </div>
            <!-- Tambah line lain seperti sebelumnya -->
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Trend Output Mingguan
    new Chart(document.getElementById('trendChart'), {
        type: 'line',
        data: {
            labels: ['Senin','Selasa','Rabu','Kamis','Jumat'],
            datasets: [{
                label: 'Output Value',
                data: [300000, 320000, 310000, 315000, 290000],
                borderColor: '#000000',
                backgroundColor: 'rgba(0,0,0,0.1)',
                fill: true,
                tension: 0.4,
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: { mode: 'index', intersect: false }
            },
            scales: {
                y: { beginAtZero: true, ticks: { callback: v => v.toLocaleString() } }
            }
        }
    });

    // Distribusi Output per Buyer
    new Chart(document.getElementById('buyerChart'), {
        type: 'doughnut',
        data: {
            labels: ['ETHAN ALLEN','CRATE & BARREL','CENTURY','UTTERMOST','VANGUARD','BRUNSWICK','GABBY','HICKORY'],
            datasets: [{
                data: [15,18,12,10,10,8,7,20],
                backgroundColor: [
                    '#16a34a','#3b82f6','#facc15','#ef4444',
                    '#a855f7','#14b8a6','#f472b6','#84cc16'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: { position: 'bottom', labels: { boxWidth: 12 } }
            }
        }
    });
</script>
@endsection
