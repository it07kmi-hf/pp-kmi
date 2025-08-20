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
    <!-- <div id="performance" class="tab-content hidden">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Performance Monitoring</h3>
            <p class="text-gray-600 mb-6">Pencapaian target bulanan per line (Jan - Jun 2025)</p>
            <div class="h-80">
                <canvas id="performanceChart"></canvas>
            </div>
        </div>
    </div> -->

    <!-- 3. Performance Monitoring -->
    <div id="performance" class="tab-content hidden">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Performance Monitoring</h3>
            <p class="text-gray-600 mb-6">Pencapaian target bulanan per line (Jan - Jun 2025)</p>

            <!-- Loop for Assembling Line 1 to 4 -->
            @for ($line = 1; $line <= 4; $line++)
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-green-700 mb-2">Assembling Line {{ $line }}</h4>
                    <p class="text-xs text-gray-600 mb-4">Performance vs target untuk semua periode</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- Harian -->
                        <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-700">Harian</span>
                                <i class="fas fa-exclamation-triangle text-yellow-500 text-xs"></i>
                            </div>
                            <div class="text-center">
                                <div class="text-lg font-bold text-green-600">$71,250</div>
                                <div class="text-xs text-gray-600">dari $75,000</div>
                                <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                                    <div class="h-2 bg-green-500 rounded-full" style="width: 95%;"></div>
                                </div>
                                <div class="flex justify-between items-center text-xs text-gray-600 mt-1">
                                    <span>95.0%</span>
                                    <span class="px-2 py-1 bg-gray-200 text-gray-700 text-xs rounded-md">Mendekati Target</span>
                                </div>
                            </div>
                        </div>

                        <!-- Mingguan -->
                        <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-700">Mingguan</span>
                                <i class="fas fa-exclamation-triangle text-yellow-500 text-xs"></i>
                            </div>
                            <div class="text-center">
                                <div class="text-lg font-bold text-green-600">$356,250</div>
                                <div class="text-xs text-gray-600">dari $375,000</div>
                                <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                                    <div class="h-2 bg-green-500 rounded-full" style="width: 95%;"></div>
                                </div>
                                <div class="flex justify-between items-center text-xs text-gray-600 mt-1">
                                    <span>95.0%</span>
                                    <span class="px-2 py-1 bg-gray-200 text-gray-700 text-xs rounded-md">Mendekati Target</span>
                                </div>
                            </div>
                        </div>

                        <!-- Bulanan -->
                        <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-700">Bulanan</span>
                                <i class="fas fa-exclamation-triangle text-yellow-500 text-xs"></i>
                            </div>
                            <div class="text-center">
                                <div class="text-lg font-bold text-green-600">$1,425,000</div>
                                <div class="text-xs text-gray-600">dari $1,500,000</div>
                                <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                                    <div class="h-2 bg-green-500 rounded-full" style="width: 95%;"></div>
                                </div>
                                <div class="flex justify-between items-center text-xs text-gray-600 mt-1">
                                    <span>95.0%</span>
                                    <span class="px-2 py-1 bg-gray-200 text-gray-700 text-xs rounded-md">Mendekati Target</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tahunan -->
                        <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-700">Tahunan</span>
                                <i class="fas fa-exclamation-triangle text-yellow-500 text-xs"></i>
                            </div>
                            <div class="text-center">
                                <div class="text-lg font-bold text-green-600">$17,100,000</div>
                                <div class="text-xs text-gray-600">dari $18,000,000</div>
                                <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                                    <div class="h-2 bg-green-500 rounded-full" style="width: 95%;"></div>
                                </div>
                                <div class="flex justify-between items-center text-xs text-gray-600 mt-1">
                                    <span>95.0%</span>
                                    <span class="px-2 py-1 bg-gray-200 text-gray-700 text-xs rounded-md">Mendekati Target</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <!-- 4. Historical Analysis -->
    <!-- <div id="historical" class="tab-content hidden">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Historical Analysis</h3>
            <p class="text-gray-600 mb-6">Tren kinerja 12 bulan terakhir</p>
            <div class="h-80">
                <canvas id="historicalChart"></canvas>
            </div>
        </div>
    </div> -->
    <!-- 4. Historical Analysis -->
    <div id="historical" class="tab-content hidden">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Historical Analysis</h3>
            <p class="text-gray-600 mb-6">Tren kinerja 12 bulan terakhir</p>

            <!-- Trend Performance Historis -->
            <div class="mb-6">
                <h4 class="text-sm font-medium text-green-700 mb-2">Trend Performance Historis</h4>
                <p class="text-xs text-gray-600 mb-4">Performance bulanan (%) vs target untuk setiap assembling line</p>
                <div class="h-80">
                    <canvas id="historicalChart"></canvas>
                </div>
            </div>

            <!-- Performance Summary -->
            <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                <h4 class="text-sm font-medium text-green-700 mb-2">Performance Summary</h4>
                <p class="text-xs text-gray-600 mb-4">Ringkasan performance 6 bulan terakhir</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <!-- Assembling Line 1 -->
                    <div class="p-4 bg-white rounded-lg shadow-sm border border-gray-200">
                        <h5 class="font-medium text-gray-800 mb-2">Assembling Line 1</h5>
                        <div class="space-y-1 text-xs">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Rata-rata:</span>
                                <span class="text-green-600 font-medium">93.3%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Terbaik:</span>
                                <span class="text-green-600 font-medium">97%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Terendah:</span>
                                <span class="text-red-600 font-medium">88%</span>
                            </div>
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                            <div class="h-2 bg-green-500 rounded-full" style="width: 93.3%;"></div>
                        </div>
                    </div>

                    <!-- Assembling Line 2 -->
                    <div class="p-4 bg-white rounded-lg shadow-sm border border-gray-200">
                        <h5 class="font-medium text-gray-800 mb-2">Assembling Line 2</h5>
                        <div class="space-y-1 text-xs">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Rata-rata:</span>
                                <span class="text-green-600 font-medium">109.3%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Terbaik:</span>
                                <span class="text-green-600 font-medium">115%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Terendah:</span>
                                <span class="text-red-600 font-medium">105%</span>
                            </div>
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                            <div class="h-2 bg-green-500 rounded-full" style="width: 109.3%;"></div>
                        </div>
                    </div>

                    <!-- Assembling Line 3 -->
                    <div class="p-4 bg-white rounded-lg shadow-sm border border-gray-200">
                        <h5 class="font-medium text-gray-800 mb-2">Assembling Line 3</h5>
                        <div class="space-y-1 text-xs">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Rata-rata:</span>
                                <span class="text-green-600 font-medium">89.3%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Terbaik:</span>
                                <span class="text-green-600 font-medium">92%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Terendah:</span>
                                <span class="text-red-600 font-medium">85%</span>
                            </div>
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                            <div class="h-2 bg-green-500 rounded-full" style="width: 89.3%;"></div>
                        </div>
                    </div>

                    <!-- Assembling Line 4 -->
                    <div class="p-4 bg-white rounded-lg shadow-sm border border-gray-200">
                        <h5 class="font-medium text-gray-800 mb-2">Assembling Line 4</h5>
                        <div class="space-y-1 text-xs">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Rata-rata:</span>
                                <span class="text-green-600 font-medium">103.0%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Terbaik:</span>
                                <span class="text-green-600 font-medium">107%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Terendah:</span>
                                <span class="text-red-600 font-medium">96%</span>
                            </div>
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                            <div class="h-2 bg-green-500 rounded-full" style="width: 103%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let performanceChart = null;
    let historicalChart = null;

    $(document).ready(function () {
        // ====== TAB SYSTEM ======
        $('.tab-button').on('click', function () {
            const tabId = $(this).data('tab');

            // Update active tab
            $('.tab-button').removeClass('text-green-700 bg-green-50 border-green-700');
            $(this).addClass('text-green-700 bg-green-50 border-green-700');

            // Show selected tab, hide others
            $('.tab-content').addClass('hidden');
            $('#' + tabId).removeClass('hidden');

            // Inisialisasi chart jika belum ada
            if (tabId === 'performance' && !performanceChart) {
                initPerformanceChart();
            }
            if (tabId === 'historical' && !historicalChart) {
                initHistoricalChart();
            }

            // Trigger resize untuk chart
            setTimeout(() => {
                window.dispatchEvent(new Event('resize'));
            }, 100);
        });

        // ====== REFRESH DATA ======
        $('#refreshData').on('click', function () {
            alert('Data berhasil diperbarui!');

            // Optional: Reload data dan update chart
            if (performanceChart) performanceChart.destroy();
            if (historicalChart) historicalChart.destroy();

            performanceChart = null;
            historicalChart = null;

            // Re-init if tab is active
            if ($('#performance').hasClass('hidden') === false) {
                initPerformanceChart();
            }
            if ($('#historical').hasClass('hidden') === false) {
                initHistoricalChart();
            }
        });

        // ====== TOGGLE STATUS (ON/OFF) ======
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

        // ====== INIT CHARTS (Dipisah agar tidak error saat tab belum aktif) ======
        function initPerformanceChart() {
            const ctx = document.getElementById('performanceChart');
            if (!ctx) return;

            const performanceCtx = ctx.getContext('2d');
            performanceChart = new Chart(performanceCtx, {
                type: 'bar',
                data: {
                    labels: ['Assembling Line 1', 'Assembling Line 2', 'Assembling Line 3', 'Assembling Line 4'],
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
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) label += ': ';
                                    return label + new Intl.NumberFormat('id-ID', {
                                        style: 'currency',
                                        currency: 'USD'
                                    }).format(context.parsed.y);
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + (value / 1000) + 'k';
                                }
                            }
                        }
                    }
                }
            });
        }

        function initHistoricalChart() {
            const ctx = document.getElementById('historicalChart');
            if (!ctx) return;

            const historicalCtx = ctx.getContext('2d');
            historicalChart = new Chart(historicalCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [
                        {
                            label: 'Assembling Line 1',
                            data: [108, 112, 105, 115, 110, 109],
                            borderColor: '#10B981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#10B981',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        },
                        {
                            label: 'Assembling Line 2',
                            data: [105, 106, 100, 102, 107, 105],
                            borderColor: '#06B6D4',
                            backgroundColor: 'rgba(6, 182, 212, 0.1)',
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#06B6D4',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        },
                        {
                            label: 'Assembling Line 3',
                            data: [92, 95, 90, 94, 97, 95],
                            borderColor: '#4ADE80',
                            backgroundColor: 'rgba(74, 222, 128, 0.1)',
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#4ADE80',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        },
                        {
                            label: 'Assembling Line 4',
                            data: [89, 88, 87, 85, 89, 88],
                            borderColor: '#60A5FA',
                            backgroundColor: 'rgba(96, 165, 250, 0.1)',
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#60A5FA',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            callbacks: {
                                label: function(context) {
                                    return `Performance: ${context.parsed.y}%`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            min: 80,
                            max: 120,
                            ticks: {
                                callback: function(value) {
                                    return value + '%';
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        // Optional: Resize chart saat tab diaktifkan
        $('.tab-button').on('click', function () {
            const tabId = $(this).data('tab');
            if (tabId === 'performance' || tabId === 'historical') {
                setTimeout(() => {
                    if (performanceChart) performanceChart.resize();
                    if (historicalChart) historicalChart.resize();
                }, 200);
            }
        });
    });
</script>
@endsection