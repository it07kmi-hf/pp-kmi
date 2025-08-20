@extends('layouts.dashboard')

@section('title', 'Dashboard Assembling')
@section('page-title', 'Dashboard Monitoring Assembling')

@section('content')
<div class="space-y-6">
    <div class="container mx-auto px-4 py-6">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Monitoring Produksi</h1>
                <p class="text-gray-500">Real-time monitoring Work Center per Assembling Line dengan sistem PRO (Production Order)</p>
            </div>

            <!-- Refresh Button -->
            <button id="refreshBtn" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h3a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                </svg>
                Refresh Data
            </button>
        </div>

        <!-- Line Selector -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Assembling Line</label>
                <p class="text-xs text-gray-500 mb-2">Pilih line untuk melihat detail Work Center dan PRO</p>
            </div>
            <select id="lineSelector" class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
                <option value="1">Assembling Line 1</option>
                <option value="2">Assembling Line 2</option>
                <option value="3">Assembling Line 3</option>
                <option value="4">Assembling Line 4</option>
            </select>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <div class="text-center">
                    <p id="statOutputValue" class="text-2xl font-bold text-green-600 mb-1">US$309,900</p>
                    <p class="text-sm text-gray-500">Total Output Value</p>
                    <p class="text-xs text-gray-500">87.9% dari target</p>
                </div>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <div class="text-center">
                    <p id="statTotalQty" class="text-2xl font-bold text-gray-800 mb-1">503</p>
                    <p class="text-sm text-gray-500">Total Quantity</p>
                    <p class="text-xs text-gray-500">unit produksi</p>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="flex border-b border-gray-200 mb-6">
            <button class="tab-button px-6 py-3 font-medium text-gray-700 border-b-2 border-green-500 bg-green-50" data-tab="tabWorkCenter">Tabel Work Center</button>
            <button class="tab-button px-6 py-3 font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700" data-tab="tabOutput">Grafik Output</button>
            <button class="tab-button px-6 py-3 font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700" data-tab="tabBuyer">Output per Buyer</button>
        </div>

        <!-- Tabel Work Center -->
        <div id="tabWorkCenter" class="tab-content">
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-gray-800" id="wcTitle">Work Center - Assembling Line 1</h3>
                    <span id="wcStatus" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">On</span>
                </div>
                <p class="text-sm text-gray-500 mb-4">Detail output, PRO, dan progress penyelesaian setiap Work Center</p>

                <div class="border rounded-lg p-5 mb-4">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <h4 id="wcName" class="font-semibold">Lifter A</h4>
                            <div class="text-sm text-gray-600">
                                <span id="wcInfo">WC-A1-01 • 3 PRO aktif • Operator: Budi Santoso</span><br>
                                <span id="wcPro" class="text-blue-600 text-xs">Current PRO: PRO-A1-001</span>
                            </div>
                        </div>
                    </div>

                    <!-- Metrics Row -->
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <div class="bg-green-50 p-3 rounded-lg text-center">
                            <p id="wcOutputValue" class="text-lg font-bold text-green-700">US$28,500</p>
                            <p class="text-xs text-gray-600">Output Value</p>
                        </div>
                        <div class="bg-blue-50 p-3 rounded-lg text-center">
                            <p id="wcOutputQty" class="text-lg font-bold text-blue-700">45</p>
                            <p class="text-xs text-gray-600">Output Quantity</p>
                        </div>
                        <div class="bg-purple-50 p-3 rounded-lg text-center">
                            <p id="wcOrderQty" class="text-lg font-bold text-purple-700">50</p>
                            <p class="text-xs text-gray-600">Order Quantity</p>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mb-2">
                        <div class="flex justify-between text-xs text-gray-500 mb-1">
                            <span>Progress Penyelesaian PRO</span>
                            <span id="wcProgressPercent">90.0%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div id="wcProgressBar" class="bg-green-500 h-2 rounded-full" style="width: 90%;"></div>
                        </div>
                        <p id="wcProgressText" class="text-xs text-gray-500 mt-1">90.0% penyelesaian PRO (45/50 unit)</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Output -->
        <div id="tabOutput" class="tab-content hidden">
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Output Harian</h3>
                <canvas id="outputChart" height="250"></canvas>
            </div>
        </div>

        <!-- Output per Buyer -->
        <div id="tabBuyer" class="tab-content hidden">
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Output per Buyer</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 text-sm text-gray-700" id="buyerTable">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">Buyer</th>
                                <th class="px-4 py-2 border">Quantity</th>
                                <th class="px-4 py-2 border">Value (US$)</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- ✅ FIX: HAPUS SPASI DI URL CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
$(document).ready(function () {
    // ✅ Data per line
    const lineData = {
        1: {outputValue:"US$309,900",totalQuantity:"503",wcName:"Lifter A",wcCode:"WC-A1-01",operator:"Budi Santoso",proActive:"3 PRO aktif",currentPro:"PRO-A1-001",outputValueWc:"US$28,500",outputQty:45,orderQty:50,progress:90.0,status:"On"},
        2: {outputValue:"US$250,500",totalQuantity:"420",wcName:"Lifter B",wcCode:"WC-A2-01",operator:"Ahmad Susanto",proActive:"2 PRO aktif",currentPro:"PRO-A2-001",outputValueWc:"US$22,000",outputQty:38,orderQty:46,progress:82.6,status:"On"},
        3: {outputValue:"US$420,300",totalQuantity:"610",wcName:"Lifter C",wcCode:"WC-A3-01",operator:"Rudi Hermawan",proActive:"4 PRO aktif",currentPro:"PRO-A3-001",outputValueWc:"US$45,000",outputQty:56,orderQty:61,progress:91.8,status:"On"},
        4: {outputValue:"US$375,800",totalQuantity:"540",wcName:"Lifter D",wcCode:"WC-A4-01",operator:"Sari Indah",proActive:"3 PRO aktif",currentPro:"PRO-A4-001",outputValueWc:"US$35,000",outputQty:48,orderQty:54,progress:88.9,status:"On"}
    };

    const buyerData = {
        1:[{buyer:"Buyer A",qty:150,value:"90,000"},{buyer:"Buyer B",qty:120,value:"75,000"},{buyer:"Buyer C",qty:100,value:"60,000"}],
        2:[{buyer:"Buyer D",qty:110,value:"55,000"},{buyer:"Buyer E",qty:140,value:"70,000"}],
        3:[{buyer:"Buyer F",qty:200,value:"120,000"},{buyer:"Buyer G",qty:180,value:"100,000"}],
        4:[{buyer:"Buyer H",qty:160,value:"95,000"},{buyer:"Buyer I",qty:150,value:"85,000"}]
    };

    // 📊 Inisialisasi Chart
    let outputChart;
    function initChart() {
        const ctx = document.getElementById('outputChart').getContext('2d');
        outputChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                datasets: [{
                    label: 'Output Quantity',
                    data: [120, 150, 180, 90, 130, 70],
                    backgroundColor: '#2563eb',
                    borderColor: '#1e40af',
                    borderWidth: 1,
                    borderRadius: 6,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: true }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    }

    // 🔄 Update UI
    function updateLineData(lineId) {
        const d = lineData[lineId];
        $('#statOutputValue').text(d.outputValue);
        $('#statTotalQty').text(d.totalQuantity);
        $('#wcTitle').text(`Work Center - Assembling Line ${lineId}`);
        $('#wcName').text(d.wcName);
        $('#wcInfo').text(`${d.wcCode} • ${d.proActive} • Operator: ${d.operator}`);
        $('#wcPro').text(`Current PRO: ${d.currentPro}`);
        $('#wcOutputValue').text(d.outputValueWc);
        $('#wcOutputQty').text(d.outputQty);
        $('#wcOrderQty').text(d.orderQty);
        $('#wcProgressPercent').text(`${d.progress.toFixed(1)}%`);
        $('#wcProgressBar').css('width', `${d.progress}%`);
        $('#wcProgressText').text(`${d.progress.toFixed(1)}% penyelesaian PRO (${d.outputQty}/${d.orderQty} unit)`);
        $('#wcStatus').text(d.status);

        // Update buyer table
        const tbody = $('#buyerTable tbody');
        tbody.empty();
        buyerData[lineId].forEach(b => {
            tbody.append(`
                <tr>
                    <td class="px-4 py-2 border">${b.buyer}</td>
                    <td class="px-4 py-2 border text-center">${b.qty}</td>
                    <td class="px-4 py-2 border text-right">US$${b.value}</td>
                </tr>
            `);
        });

        // Update chart data based on line
        if (outputChart) {
            const chartData = {
                1: [120, 150, 180, 90, 130, 70],
                2: [100, 130, 160, 110, 140, 80],
                3: [180, 200, 220, 150, 190, 120],
                4: [150, 170, 190, 130, 160, 110]
            };
            outputChart.data.datasets[0].data = chartData[lineId];
            outputChart.update();
        }
    }

    // ✅ Inisialisasi
    initChart();
    updateLineData(1);

    // 🔁 Refresh Button
    $('#refreshBtn').on('click', function () {
        const lineId = $('#lineSelector').val();
        const d = lineData[lineId];

        // Simulasi perubahan data
        d.progress = parseFloat((Math.random() * 20 + 70).toFixed(1)); // 70-90%
        d.outputQty = Math.floor(d.progress / 100 * d.orderQty);
        updateLineData(lineId);
    });

    // 🔄 Ganti Line
    $('#lineSelector').on('change', function () {
        const lineId = $(this).val();
        updateLineData(lineId);
    });

    // 📑 Tab System (Fix: Gunakan class hidden/tidak hidden)
    $('.tab-button').on('click', function () {
        // Reset tab
        $('.tab-button').removeClass('border-green-500 bg-green-50 text-gray-700')
                        .addClass('text-gray-500 border-transparent');
        // Aktifkan tab
        $(this).addClass('border-green-500 bg-green-50 text-gray-700')
               .removeClass('text-gray-500 border-transparent');

        // Sembunyikan semua tab
        $('.tab-content').addClass('hidden');
        // Tampilkan yang dipilih
        const tabId = $(this).data('tab');
        $('#' + tabId).removeClass('hidden');
    });

    // ✅ Pastikan tab Work Center aktif saat load
    $('#tabWorkCenter').removeClass('hidden');
});
</script>
@endpush