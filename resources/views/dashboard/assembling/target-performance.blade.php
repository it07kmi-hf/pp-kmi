@extends('layouts.dashboard')

@section('title', 'Target & Performance')
@section('page-title', 'Target & Performance Assembling')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-green-700">Target & Performance</h1>
            <p class="text-gray-600 mt-1">Manajemen target dan monitoring pencapaian kinerja</p>
        </div>
        <button id="refreshData" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition-colors">
            <i class="fas fa-sync-alt"></i>
            <span>Refresh Data</span>
        </button>
    </div>

    <!-- Tabs Navigation -->
    <div class="mb-6 border-b border-gray-200">
        <nav class="flex space-x-4">
            <button class="tab-button py-2 px-3 text-sm font-medium text-green-700 bg-green-50 border-b-2 border-green-700 rounded-t-lg" data-tab="targetSetting">
                Target Setting
            </button>
            <button class="tab-button py-2 px-3 text-sm font-medium text-gray-600 hover:text-gray-900 border-b-2 border-transparent hover:border-gray-300" data-tab="workCenter">
                Work Center Control
            </button>
            <button class="tab-button py-2 px-3 text-sm font-medium text-gray-600 hover:text-gray-900 border-b-2 border-transparent hover:border-gray-300" data-tab="performance">
                Performance Monitoring
            </button>
            <button class="tab-button py-2 px-3 text-sm font-medium text-gray-600 hover:text-gray-900 border-b-2 border-transparent hover:border-gray-300" data-tab="historical">
                Historical Analysis
            </button>
        </nav>
    </div>

    <!-- Tab Contents -->

    <!-- 1. Target Setting -->
    <div id="targetSetting" class="tab-content">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="mb-6">
                <h3 class="text-sm font-medium text-green-700">Setting Target per Assembling Line</h3>
                <p class="text-sm text-gray-600 mt-1">Atur target output value untuk setiap periode dan line</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-200 bg-gray-50">
                            <th class="py-3 px-4 font-semibold text-gray-700">Assembling Line</th>
                            <th class="py-3 px-4 font-semibold text-gray-700">Harian</th>
                            <th class="py-3 px-4 font-semibold text-gray-700">Mingguan</th>
                            <th class="py-3 px-4 font-semibold text-gray-700">Bulanan</th>
                            <th class="py-3 px-4 font-semibold text-gray-700">Tahunan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 4; $i++)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="font-medium text-gray-800">Assembling Line {{ $i }}</div>
                                <div class="text-xs text-gray-500">Line {{ $i }}</div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="text-green-600 font-medium">$75,000</div>
                                <div class="text-xs text-gray-500">/hari</div>
                                <button class="ml-2 text-gray-500 hover:text-green-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td class="py-4 px-4">
                                <div class="text-green-600 font-medium">$375,000</div>
                                <div class="text-xs text-gray-500">/minggu</div>
                                <button class="ml-2 text-gray-500 hover:text-green-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td class="py-4 px-4">
                                <div class="text-green-600 font-medium">$1,500,000</div>
                                <div class="text-xs text-gray-500">/bulan</div>
                                <button class="ml-2 text-gray-500 hover:text-green-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td class="py-4 px-4">
                                <div class="text-green-600 font-medium">$18,000,000</div>
                                <div class="text-xs text-gray-500">/tahun</div>
                                <button class="ml-2 text-gray-500 hover:text-green-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- 2. Work Center Control (Sesuai Gambar) -->
    <div id="workCenter" class="tab-content hidden">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Work Center Control</h3>
            <p class="text-gray-600 mb-6">Control on/off status untuk setiap Work Center</p>

            <!-- Loop untuk Assembling Line 1 sampai 4 -->
            @for ($line = 1; $line <= 4; $line++)
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-4">Assembling Line {{ $line }}</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <!-- Loop untuk Lifter A sampai L -->
                        @foreach(['A','B','C','D','E','F','G','H','I','J','K','L'] as $lifter)
                            @php
                                $id = "lifter{$lifter}Line{$line}";
                                $wcCode = "WC-A{$line}-0{$loop->iteration}";
                                $status = rand(0,1) ? 'on' : 'off'; // dummy status
                                $bgClass = $status === 'on' ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200';
                                $textStatusColor = $status === 'on' ? 'text-green-600' : 'text-red-600';
                                $toggleBg = $status === 'on' ? 'bg-green-500' : 'bg-red-500';
                                $toggleTranslate = $status === 'on' ? 'translateX(14px)' : 'translateX(0)';
                                $output = $status === 'on' ? rand(40, 60) . ' unit' : rand(10, 25) . ' unit';
                                $outputColor = $status === 'on' ? 'text-gray-800' : 'text-red-600';
                            @endphp

                            <div class="border border-green-200 {{ $bgClass }} rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <div class="font-medium text-gray-800">Lifter {{ $lifter }}</div>
                                        <div class="text-xs text-gray-500">{{ $wcCode }}</div>
                                    </div>
                                    <button 
                                        class="toggle-switch" 
                                        data-id="{{ $id }}"
                                        data-status="{{ $status }}"
                                        onclick="toggleStatus('{{ $id }}')"
                                    >
                                        <div class="flex items-center space-x-2">
                                            <!-- Power Icon -->
                                            <svg class="w-4 h-4 {{ $status === 'on' ? 'text-green-600' : 'text-red-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 110-12 6 6 0 010 12z"/>
                                                <path d="M10 5.5a1.5 1.5 0 011.5 1.5v1a1.5 1.5 0 01-3 0v-1A1.5 1.5 0 0110 5.5z"/>
                                            </svg>
                                            <!-- Toggle Switch -->
                                            <div class="relative inline-block w-10 h-6 rounded-full {{ $toggleBg }} transition-colors duration-200 ease-in-out">
                                                <div class="absolute inset-0 flex items-center justify-center">
                                                    <div class="w-4 h-4 bg-white rounded-full shadow transform transition-transform duration-200 ease-in-out" style="transform: {{ $toggleTranslate }};"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <div class="mt-3 space-y-1 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Status:</span>
                                        <span class="{{ $textStatusColor }} font-medium">{{ ucfirst($status) }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Operator:</span>
                                        <span class="text-gray-800">Operator {{ $lifter }}{{ $line }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Output:</span>
                                        <span class="{{ $outputColor }}">{{ $output }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Enabled:</span>
                                        <span class="text-green-600">Ya</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <!-- 3. Performance Monitoring -->
    <div id="performance" class="tab-content hidden">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Performance Monitoring</h3>
            <p class="text-gray-600 mb-6">Pencapaian target bulanan per line (Jan - Jun 2025)</p>
            <div class="h-80">
                <canvas id="performanceChart"></canvas>
            </div>
        </div>
    </div>

    <!-- 4. Historical Analysis -->
    <div id="historical" class="tab-content hidden">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Historical Analysis</h3>
            <p class="text-gray-600 mb-6">Tren kinerja 12 bulan terakhir</p>
            <div class="h-80">
                <canvas id="historicalChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let performanceChart, historicalChart;

    $(document).ready(function () {
        // Tab System
        $('.tab-button').on('click', function () {
            const tabId = $(this).data('tab');

            // Update active tab
            $('.tab-button').removeClass('text-green-700 bg-green-50 border-green-700');
            $(this).addClass('text-green-700 bg-green-50 border-green-700');

            // Show selected tab, hide others
            $('.tab-content').addClass('hidden');
            $('#' + tabId).removeClass('hidden');

            // Trigger resize untuk chart
            setTimeout(() => {
                window.dispatchEvent(new Event('resize'));
            }, 100);
        });

        // Refresh Data Button
        $('#refreshData').on('click', function () {
            alert('Data berhasil diperbarui!');
        });

        // Initialize Charts
        initCharts();

        // Global Toggle Function
        window.toggleStatus = function (id) {
            const $button = $(`[data-id="${id}"]`);
            const $card = $button.closest('.p-4');
            const $statusText = $card.find('span:contains("On"), span:contains("Off")').first();
            const $toggle = $button.find('.bg-green-500, .bg-red-500');
            const $svg = $button.find('svg');
            const $output = $card.find('span:contains("unit")');
            const currentStatus = $button.attr('data-status');

            if (currentStatus === 'on') {
                // Turn OFF
                $button.attr('data-status', 'off');
                $statusText.text('Off').removeClass('text-green-600').addClass('text-red-600');
                $toggle.removeClass('bg-green-500').addClass('bg-red-500');
                $svg.css('fill', '#ef4444');
                $toggle.find('.bg-white').css('transform', 'translateX(0)');
                $card.removeClass('bg-green-50 border-green-200').addClass('bg-red-50 border-red-200');
                $output.removeClass('text-gray-800').addClass('text-red-600');
            } else {
                // Turn ON
                $button.attr('data-status', 'on');
                $statusText.text('On').removeClass('text-red-600').addClass('text-green-600');
                $toggle.removeClass('bg-red-500').addClass('bg-green-500');
                $svg.css('fill', '#10b981');
                $toggle.find('.bg-white').css('transform', 'translateX(14px)');
                $card.removeClass('bg-red-50 border-red-200').addClass('bg-green-50 border-green-200');
                $output.removeClass('text-red-600').addClass('text-gray-800');
            }
        };

        function initCharts() {
            // Performance Chart
            const performanceCtx = document.getElementById('performanceChart').getContext('2d');
            performanceChart = new Chart(performanceCtx, {
                type: 'bar',
                data: {
                    labels: ['Line 1', 'Line 2', 'Line 3', 'Line 4'],
                    datasets: [
                        {
                            label: 'Target Bulanan',
                            data: [1500000, 1500000, 1500000, 1500000],
                            backgroundColor: 'rgba(34, 197, 94, 0.2)',
                            borderColor: 'rgba(34, 197, 94, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Realisasi',
                            data: [1420000, 1380000, 1450000, 1320000],
                            backgroundColor: 'rgba(59, 130, 246, 0.2)',
                            borderColor: 'rgba(59, 130, 246, 1)',
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
                                callback: value => '$' + (value / 1000) + 'k'
                            }
                        }
                    }
                }
            });

            // Historical Chart
            const historicalCtx = document.getElementById('historicalChart').getContext('2d');
            historicalChart = new Chart(historicalCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Output Value',
                        data: [1300000, 1350000, 1420000, 1380000, 1450000, 1520000, 1480000, 1500000, 1550000, 1580000, 1620000, 1650000],
                        borderColor: '#10B981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: false,
                            ticks: {
                                callback: value => '$' + (value / 1000) + 'k'
                            }
                        }
                    }
                }
            });
        }
    });
</script>
@endsection