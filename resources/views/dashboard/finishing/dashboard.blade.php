@extends('layouts.dashboard')

@section('title', 'Dashboard Finishing')
@section('page-title', 'Dashboard Monitoring Finishing')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Dashboard Monitoring Finishing</h1>
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
            <div class="absolute top-4 right-4 text-4xl text-green-500 font-bold">$</div>
            
            <h3 class="text-sm font-medium text-gray-500">Total Output Value</h3>
            <p class="text-2xl font-bold text-gray-900">$1,353,400</p>

            <!-- Progress Bar -->
            <div class="w-full bg-gray-200 h-2 rounded-full mt-3 overflow-hidden">
                <div class="bg-black h-2 rounded-full" style="width: 100%"></div>
            </div>

            <p class="text-sm text-gray-600 mt-2">112.8% dari target</p>
        </div>

        <!-- Total Quantity -->
        <div class="bg-white rounded-lg shadow p-6 relative overflow-hidden">
            <!-- Icon box di pojok kanan atas -->
            <div class="absolute top-4 right-4 text-4xl text-green-500">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </div>
            
            <h3 class="text-sm font-medium text-gray-500">Total Quantity</h3>
            <p class="text-2xl font-bold text-gray-900">2,174 unit</p>
            <p class="text-sm text-green-600 mt-2">↑ +5.2% dari kemarin</p>
        </div>

        <!-- Lines On Target -->
        <div class="bg-white rounded-lg shadow p-6 relative overflow-hidden">
            <!-- Icon checklist di pojok kanan atas -->
            <div class="absolute top-4 right-4 text-4xl text-green-500">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                </svg>
            </div>
            
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
            <h2 class="text-lg font-semibold text-green-600 mb-1">Trend Output Mingguan</h2>
            <p class="text-sm text-gray-500 mb-4">Output value dan quantity per hari</p>
            <div class="h-72">
                <canvas id="trendChart"></canvas>
            </div>
        </div>

        <!-- Distribusi Output per Buyer -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold text-green-600 mb-1">Distribusi Output per Buyer</h2>
            <p class="text-sm text-gray-500 mb-4">Breakdown output berdasarkan buyer</p>
            <div class="h-72">
                <canvas id="buyerChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Performance per Finishing Line -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-green-600 mb-1">Performance per Finishing Line</h2>
            <p class="text-sm text-gray-500">Target vs actual output untuk setiap line produksi</p>
        </div>
        <div class="p-6 space-y-6">
            <!-- Line 1 -->
            <div>
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <span class="font-medium">Finishing Line 1</span>
                        <svg class="w-4 h-4 ml-2 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-medium text-gray-900">$309,900 / $300,000</div>
                        <div class="text-sm text-gray-500">503 unit</div>
                    </div>
                </div>
                <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                    <div class="bg-black h-2 rounded-full" style="width: 100%"></div>
                </div>
                <div class="flex justify-between items-center mt-2">
                    <p class="text-sm text-gray-600">103.3% dari target</p>
                    <span class="bg-green-500 text-white px-2 py-1 rounded text-xs font-medium">Target Tercapai</span>
                </div>
            </div>

            <!-- Line 2 -->
            <div>
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <span class="font-medium">Finishing Line 2</span>
                        <svg class="w-4 h-4 ml-2 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-medium text-gray-900">$390,000 / $300,000</div>
                        <div class="text-sm text-gray-500">650 unit</div>
                    </div>
                </div>
                <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                    <div class="bg-black h-2 rounded-full" style="width: 100%"></div>
                </div>
                <div class="flex justify-between items-center mt-2">
                    <p class="text-sm text-gray-600">130.0% dari target</p>
                    <span class="bg-green-500 text-white px-2 py-1 rounded text-xs font-medium">Target Tercapai</span>
                </div>
            </div>

            <!-- Line 3 -->
            <div>
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <span class="font-medium">Finishing Line 3</span>
                        <svg class="w-4 h-4 ml-2 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-medium text-gray-900">$363,500 / $300,000</div>
                        <div class="text-sm text-gray-500">590 unit</div>
                    </div>
                </div>
                <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                    <div class="bg-black h-2 rounded-full" style="width: 100%"></div>
                </div>
                <div class="flex justify-between items-center mt-2">
                    <p class="text-sm text-gray-600">121.2% dari target</p>
                    <span class="bg-green-500 text-white px-2 py-1 rounded text-xs font-medium">Target Tercapai</span>
                </div>
            </div>

            <!-- Line 4 -->
            <div>
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <span class="font-medium">Finishing Line 4</span>
                        <svg class="w-4 h-4 ml-2 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-medium text-gray-900">$290,000 / $300,000</div>
                        <div class="text-sm text-gray-500">431 unit</div>
                    </div>
                </div>
                <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                    <div class="bg-red-500 h-2 rounded-full" style="width: 96.7%"></div>
                </div>
                <div class="flex justify-between items-center mt-2">
                    <p class="text-sm text-gray-600">96.7% dari target</p>
                    <span class="bg-red-500 text-white px-2 py-1 rounded text-xs font-medium">Belum Tercapai</span>
                </div>
            </div>
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