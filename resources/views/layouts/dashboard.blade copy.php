<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - PT. KAYUMEBEL INDONESIA')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar-transition { transition: all 0.3s ease-in-out; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .active-menu { background-color: #047857; position: relative; }
        .active-menu:after {
            content: ''; position: absolute; right: 0; top: 0; bottom: 0;
            width: 4px; background-color: #fff; border-radius: 4px 0 0 4px;
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar Overlay (Mobile) -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>

    <!-- Sidebar -->
    <div id="sidebar" class="bg-green-800 text-white sidebar-transition fixed lg:relative z-50 h-screen -translate-x-full lg:translate-x-0 w-64 lg:w-64 min-h-screen">
        <div class="p-4 h-full flex flex-col">
            <!-- Logo -->
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-leaf text-white"></i>
                    </div>
                    <div id="logo-text">
                        <h1 class="text-lg font-bold">PT. KMI</h1>
                        <p class="text-xs text-green-200">{{ ucfirst(auth()->user()->role) }} Division</p>
                    </div>
                </div>
                <button id="toggle-sidebar-mobile" class="lg:hidden">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-8 flex-1">
                <div class="px-4">
                    <ul class="space-y-2">

                        {{-- ===================== UNIVERSAL MENU ===================== --}}
                        <li>
                            <a href="{{ route(auth()->user()->role.'.dashboard') }}"
                               class="flex items-center space-x-3 text-white hover:bg-green-700 rounded-lg px-3 py-2 
                               @if(request()->routeIs(auth()->user()->role.'.dashboard')) active-menu @endif">
                                <i class="fas fa-tachometer-alt w-5"></i>
                                <span class="sidebar-text">Dashboard</span>
                            </a>
                        </li>

                        {{-- ===================== ROLE BASED MENU ===================== --}}

                        {{-- Admin bisa lihat semua menu --}}
                        @if(auth()->user()->role == 'admin')
                            <li>
                                <a href="{{ route('admin.monitoring.produksi') }}"
                                   class="flex items-center space-x-3 text-white hover:bg-green-700 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('admin.monitoring.produksi')) active-menu @endif">
                                    <i class="fas fa-chart-line w-5"></i>
                                    <span class="sidebar-text">Monitoring Produksi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.report.buyer') }}"
                                   class="flex items-center space-x-3 text-white hover:bg-green-700 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('admin.report.buyer')) active-menu @endif">
                                    <i class="fas fa-file-alt w-5"></i>
                                    <span class="sidebar-text">Report per Buyer</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.target.performance') }}"
                                   class="flex items-center space-x-3 text-white hover:bg-green-700 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('admin.target.performance')) active-menu @endif">
                                    <i class="fas fa-bullseye w-5"></i>
                                    <span class="sidebar-text">Target & Performance</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.laporan.periode') }}"
                                   class="flex items-center space-x-3 text-white hover:bg-green-700 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('admin.laporan.periode')) active-menu @endif">
                                    <i class="fas fa-calendar-alt w-5"></i>
                                    <span class="sidebar-text">Laporan Periode</span>
                                </a>
                            </li>
                        @endif

                        {{-- ===================== ASEMBLING ===================== --}}
                        @if(auth()->user()->role == 'asemmbling')
                            <li>
                                <a href="{{ route('asemmbling.dashboard') }}"
                                class="flex items-center space-x-3 text-gray-700 hover:bg-green-100 rounded-lg px-3 py-2 
                                @if(request()->routeIs('asemmbling.dashboard')) bg-green-50 text-green-700 font-semibold @endif">
                                    <i class="fas fa-home w-5"></i>
                                    <span class="sidebar-text">Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('asemmbling.monitoring.produksi') }}"
                                class="flex items-center space-x-3 text-gray-700 hover:bg-green-100 rounded-lg px-3 py-2 
                                @if(request()->routeIs('asemmbling.monitoring.produksi')) bg-green-50 text-green-700 font-semibold @endif">
                                    <i class="fas fa-chart-line w-5"></i>
                                    <span class="sidebar-text">Monitoring Produksi</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('asemmbling.report.buyer') }}"
                                class="flex items-center space-x-3 text-gray-700 hover:bg-green-100 rounded-lg px-3 py-2 
                                @if(request()->routeIs('asemmbling.report.buyer')) bg-green-50 text-green-700 font-semibold @endif">
                                    <i class="fas fa-users w-5"></i>
                                    <span class="sidebar-text">Report per Buyer</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('asemmbling.target.performance') }}"
                                class="flex items-center space-x-3 text-gray-700 hover:bg-green-100 rounded-lg px-3 py-2 
                                @if(request()->routeIs('asemmbling.target.performance')) bg-green-50 text-green-700 font-semibold @endif">
                                    <i class="fas fa-bullseye w-5"></i>
                                    <span class="sidebar-text">Target & Performance</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('asemmbling.laporan.periode') }}"
                                class="flex items-center space-x-3 text-gray-700 hover:bg-green-100 rounded-lg px-3 py-2 
                                @if(request()->routeIs('asemmbling.laporan.periode')) bg-green-50 text-green-700 font-semibold @endif">
                                    <i class="fas fa-calendar-alt w-5"></i>
                                    <span class="sidebar-text">Laporan Periode</span>
                                </a>
                            </li>
                        @endif

                        {{-- Packing hanya Laporan Periode --}}
                        @if(auth()->user()->role == 'packing')
                            <li>
                                <a href="{{ route('packing.laporan.periode') }}"
                                   class="flex items-center space-x-3 text-white hover:bg-green-700 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('packing.laporan.periode')) active-menu @endif">
                                    <i class="fas fa-calendar-alt w-5"></i>
                                    <span class="sidebar-text">Laporan Periode</span>
                                </a>
                            </li>
                        @endif

                        {{-- Role lain tinggal tambah sesuai kebutuhan --}}
                        @if(auth()->user()->role == 'finishing')
                            <li>
                                <a href="{{ route('finishing.report.buyer') }}"
                                   class="flex items-center space-x-3 text-white hover:bg-green-700 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('finishing.report.buyer')) active-menu @endif">
                                    <i class="fas fa-file-alt w-5"></i>
                                    <span class="sidebar-text">Report per Buyer</span>
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
            </nav>

            <!-- User Info & Logout -->
            <div class="mt-auto p-4 border-t border-green-700">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="sidebar-text">
                        <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-green-200">{{ ucfirst(auth()->user()->role) }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="flex items-center space-x-3 w-full text-left text-white hover:bg-green-700 rounded-lg px-3 py-2">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span class="sidebar-text">Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center space-x-4">
                    <button id="toggle-sidebar-desktop" class="text-gray-600 hover:text-gray-900 lg:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <button id="toggle-sidebar-collapse" class="text-gray-600 hover:text-gray-900 hidden lg:block">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800">@yield('page-title')</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">{{ now()->format('d M Y, H:i') }}</span>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6 no-scrollbar">
            @yield('content')
        </main>
    </div>
</div>

<script>
    $(document).ready(function() {
        let sidebarCollapsed = false;
        $('#toggle-sidebar-desktop').click(function() {
            $('#sidebar').removeClass('-translate-x-full');
            $('#sidebar-overlay').removeClass('hidden');
        });
        $('#toggle-sidebar-mobile').click(function() {
            $('#sidebar').addClass('-translate-x-full');
            $('#sidebar-overlay').addClass('hidden');
        });
        $('#toggle-sidebar-collapse').click(function() {
            sidebarCollapsed = !sidebarCollapsed;
            if (sidebarCollapsed) {
                $('#sidebar').addClass('lg:w-20').removeClass('lg:w-64');
                $('.sidebar-text, #logo-text').hide();
            } else {
                $('#sidebar').removeClass('lg:w-20').addClass('lg:w-64');
                $('.sidebar-text, #logo-text').show();
            }
        });
        $('#sidebar-overlay').click(function() {
            $('#sidebar').addClass('-translate-x-full');
            $('#sidebar-overlay').addClass('hidden');
        });
        function handleResize() {
            if ($(window).width() >= 1024) {
                $('#sidebar').removeClass('-translate-x-full');
                $('#sidebar-overlay').addClass('hidden');
                if (sidebarCollapsed) {
                    $('#sidebar').addClass('lg:w-20').removeClass('lg:w-64');
                    $('.sidebar-text, #logo-text').hide();
                } else {
                    $('#sidebar').removeClass('lg:w-20').addClass('lg:w-64');
                    $('.sidebar-text, #logo-text').show();
                }
            } else {
                if (!$('#sidebar').hasClass('-translate-x-full')) {
                    $('#sidebar-overlay').removeClass('hidden');
                }
            }
        }
        $(window).resize(handleResize);
        handleResize();
    });
</script>
</body>
</html>
