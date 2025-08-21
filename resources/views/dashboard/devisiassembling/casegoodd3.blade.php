<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casegood D1 - Detail Produksi</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <style>
        .tab-active {
            background-color: #f0fdf4;
            color: #16a34a;
            border-radius: 9999px;
        }
        .card-shadow {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto p-4 max-w-7xl">
        <!-- Header -->
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Casegood D1 - Detail Produksi</h1>
                <p class="text-gray-600">Divisi Assembling - PT. KAYUMEBEL INDONESIA</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500">Data harian</p>
            </div>
        </div>

        <!-- Period Monitoring Section -->
        <div class="bg-white rounded-lg card-shadow p-4 mb-6 flex justify-between items-center">
            <div class="flex items-center">
                <i class="far fa-calendar-alt mr-2 text-gray-500"></i>
                <span class="font-medium text-gray-700">Periode Monitoring</span>
            </div>
            
            <div class="flex items-center space-x-2">
                <button class="px-4 py-1 rounded-full tab-active text-sm font-medium">Harian</button>
                <button class="px-4 py-1 rounded-full text-gray-600 text-sm font-medium hover:bg-gray-100">Mingguan</button>
                <button class="px-4 py-1 rounded-full text-gray-600 text-sm font-medium hover:bg-gray-100">Bulanan</button>
                
                <button class="ml-4 px-3 py-1 rounded-md border border-gray-300 text-gray-600 text-sm flex items-center">
                    <i class="fas fa-filter mr-1"></i>
                    Filter Periode Khusus
                </button>
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
                <div class="text-3xl font-bold text-gray-800 mb-1">268</div>
                <div class="text-sm text-gray-500">pieces (Harian)</div>
            </div>

            <!-- Unit Value Card -->
            <div class="bg-white rounded-lg card-shadow p-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-gray-600 font-medium">Unit Value</h3>
                    <i class="fas fa-dollar-sign text-gray-400"></i>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-1">$13,400</div>
                <div class="text-sm text-gray-500">USD (Harian)</div>
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
                <span class="font-medium text-gray-700">Detail Work Center - Casegood D1</span>
                <span class="ml-2 px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Harian</span>
            </div>

            <!-- Work Center Item -->
            <div class="border-b pb-4 mb-4">
                <div class="flex items-center justify-between cursor-pointer" onclick="toggleWorkCenter('wc01')">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-chevron-right text-green-600 transform rotate-90"></i>
                        </div>
                        <div>
                            <div class="flex items-center">
                                <i class="fas fa-box mr-2 text-gray-500"></i>
                                <span class="font-medium">Casegood D1</span>
                                <span class="ml-2 text-sm text-gray-500">6 Work Centers</span>
                            </div>
                        </div>
                    </div>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Harian</span>
                </div>
                
                <!-- Work Center Details (Initially Hidden) -->
                <div id="wc01-details" class="hidden mt-4 pl-11">
                    <div class="bg-green-50 rounded-lg p-4 mb-4">
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                <span class="font-medium">Work Center 01</span>
                            </div>
                            <span class="text-sm text-gray-500">D1-WC01</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <i class="fas fa-user mr-2 text-gray-500"></i>
                            <span class="text-gray-700">Budi Santoso</span>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-sm text-gray-500 mb-1">Quantity</div>
                                <div class="text-lg font-semibold">45 pcs</div>
                            </div>
                            <div>
                                <div class="text-sm text-gray-500 mb-1">Value</div>
                                <div class="text-lg font-semibold">$2,250</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Additional Work Centers would go here -->
                </div>
            </div>

            <!-- Summary Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-cube text-green-500 mr-2"></i>
                        <span class="text-gray-600">Total Quantity</span>
                    </div>
                    <div class="text-xl font-bold text-gray-800">268 pcs</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-dollar-sign text-green-500 mr-2"></i>
                        <span class="text-gray-600">Total Value</span>
                    </div>
                    <div class="text-xl font-bold text-gray-800">$13,400</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleWorkCenter(id) {
            const detailsElement = document.getElementById(id + '-details');
            const chevronIcon = event.target.closest('.cursor-pointer').querySelector('.fa-chevron-right');
            
            if (detailsElement.classList.contains('hidden')) {
                detailsElement.classList.remove('hidden');
                chevronIcon.style.transform = 'rotate(0deg)';
            } else {
                detailsElement.classList.add('hidden');
                chevronIcon.style.transform = 'rotate(90deg)';
            }
        }
    </script>
</body>
</html>