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
        .sidebar-transition { transition: all 0.4s ease-in-out; }
        .fade-slide {
            opacity: 0;
            transform: translateX(-12px);
            transition: all 0.35s ease-in-out;
        }
        .fade-slide.show {
            opacity: 1;
            transform: translateX(0);
        }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-gray-100">
<div class="flex h-screen overflow-hidden">
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>
    <div id="sidebar" class="bg-white text-gray-700 sidebar-transition fixed lg:relative z-50 h-screen -translate-x-full lg:translate-x-0 w-64 lg:w-64 min-h-screen border-r border-gray-200">
        <div class="p-4 h-full flex flex-col">
            <nav class="mt-4 flex-1">
                <div class="px-2">
                    <ul class="space-y-2">
                        {{-- ASSEMBLING --}}
                        @if(auth()->user()->role == 'assembling')
                            <li>
                                <a href="{{ route(auth()->user()->role.'.dashboard') }}"
                                   class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                   @if(request()->routeIs(auth()->user()->role.'.dashboard')) bg-green-50 text-green-700 font-semibold @else text-gray-700 hover:bg-gray-100 @endif">
                                    <i class="fas fa-home w-5"></i>
                                    <span class="sidebar-text fade-slide show text-sm">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('assembling.monitoring.produksi') }}"
                                   class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('assembling.monitoring.produksi')) bg-green-50 text-green-700 font-semibold @else text-gray-700 hover:bg-gray-100 @endif">
                                    <i class="fas fa-chart-line w-5"></i>
                                    <span class="sidebar-text fade-slide show text-sm">Monitoring Produksi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('assembling.report.buyer') }}"
                                   class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('assembling.report.buyer')) bg-green-50 text-green-700 font-semibold @else text-gray-700 hover:bg-gray-100 @endif">
                                    <i class="fas fa-users w-5"></i>
                                    <span class="sidebar-text fade-slide show text-sm">Report per Buyer</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('assembling.target.performance') }}"
                                   class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('assembling.target.performance')) bg-green-50 text-green-700 font-semibold @else text-gray-700 hover:bg-gray-100 @endif">
                                    <i class="fas fa-bullseye w-5"></i>
                                    <span class="sidebar-text fade-slide show text-sm">Target & Performance</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('assembling.laporan.periode') }}"
                                   class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('assembling.laporan.periode')) bg-green-50 text-green-700 font-semibold @else text-gray-700 hover:bg-gray-100 @endif">
                                    <i class="fas fa-calendar-alt w-5"></i>
                                    <span class="sidebar-text fade-slide show text-sm">Laporan Periode</span>
                                </a>
                            </li>
                        @endif
                        {{-- DEVISI ASSEMBLING --}}
                        @if(auth()->user()->role == 'devisiassembling')
                            <!-- Dashboard Overview -->
                            <li>
                                <a href="{{ route(auth()->user()->role.'.dashboard') }}"
                                class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                @if(request()->routeIs(auth()->user()->role.'.dashboard')) bg-green-50 text-green-700 font-semibold @else text-gray-700 hover:bg-gray-100 @endif">
                                    <i class="fas fa-chart-line w-5"></i> {{-- Ikon dashboard --}}
                                    <span class="sidebar-text fade-slide show text-sm">Dashboard Overview</span>
                                </a>
                            </li>

                            <!-- Unit Produksi Section -->
                            <div class="sidebar-text text-sm font-semibold text-gray-500 uppercase mb-2 mt-6">UNIT PRODUKSI</div>
                            
                            <!-- Casegood Items -->
                            <!-- <li>
                                <a href="{{ route('devisiassembling.casegoodd1') }}" class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('devisiassembling.casegoodd1')) bg-green-50 text-green-700 font-semibold @else text-gray-700 hover:bg-gray-100 @endif"">
                                    <i class="fas fa-box w-5"></i> {{-- Ikon kotak --}}
                                    <span class="sidebar-text text-sm">Casegood D1</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('devisiassembling.casegoodd2') }}" class="flex items-center space-x-3 rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-box w-5"></i> {{-- Ikon kotak --}}
                                    <span class="sidebar-text text-sm">Casegood D2</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('devisiassembling.casegoodd3') }}" class="flex items-center space-x-3 rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-box w-5"></i> {{-- Ikon kotak --}}
                                    <span class="sidebar-text text-sm">Casegood D3</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('devisiassembling.casegoodd4') }}" class="flex items-center space-x-3 rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-box w-5"></i> {{-- Ikon kotak --}}
                                    <span class="sidebar-text text-sm">Casegood D4</span>
                                </a>
                            </li> -->
                            <li>
                                <a href="{{ route('devisiassembling.casegoodd1') }}" 
                                class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                        @if(request()->routeIs('devisiassembling.casegoodd1')) 
                                            bg-green-50 text-green-700 font-semibold 
                                        @else 
                                            text-gray-700 hover:bg-gray-100 
                                        @endif">
                                    <i class="fas fa-box w-5"></i> {{-- Ikon kotak --}}
                                    <span class="sidebar-text text-sm">Casegood D1</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('devisiassembling.casegoodd2') }}" 
                                class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                        @if(request()->routeIs('devisiassembling.casegoodd2')) 
                                            bg-green-50 text-green-700 font-semibold 
                                        @else 
                                            text-gray-700 hover:bg-gray-100 
                                        @endif">
                                    <i class="fas fa-box w-5"></i>
                                    <span class="sidebar-text text-sm">Casegood D2</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('devisiassembling.casegoodd3') }}" 
                                class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                        @if(request()->routeIs('devisiassembling.casegoodd3')) 
                                            bg-green-50 text-green-700 font-semibold 
                                        @else 
                                            text-gray-700 hover:bg-gray-100 
                                        @endif">
                                    <i class="fas fa-box w-5"></i>
                                    <span class="sidebar-text text-sm">Casegood D3</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('devisiassembling.casegoodd4') }}" 
                                class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                        @if(request()->routeIs('devisiassembling.casegoodd4')) 
                                            bg-green-50 text-green-700 font-semibold 
                                        @else 
                                            text-gray-700 hover:bg-gray-100 
                                        @endif">
                                    <i class="fas fa-box w-5"></i>
                                    <span class="sidebar-text text-sm">Casegood D4</span>
                                </a>
                            </li>
                            
                            <!-- Other Production Units -->

                            <li>
                                <a href="{{ route('devisiassembling.chair') }}" 
                                class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                        @if(request()->routeIs('devisiassembling.chair')) 
                                            bg-green-50 text-green-700 font-semibold 
                                        @else 
                                            text-gray-700 hover:bg-gray-100 
                                        @endif">
                                    <i class="fas fa-chair w-5"></i> {{-- Ikon kursi --}}
                                    <span class="sidebar-text text-sm">Chair</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('devisiassembling.metal') }}" 
                                class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                        @if(request()->routeIs('devisiassembling.metal')) 
                                            bg-green-50 text-green-700 font-semibold 
                                        @else 
                                            text-gray-700 hover:bg-gray-100 
                                        @endif">
                                    <i class="fas fa-cogs w-5"></i> {{-- Ikon mesin/logam --}}
                                    <span class="sidebar-text text-sm">Metal</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('devisiassembling.playfield') }}" 
                                class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                        @if(request()->routeIs('devisiassembling.playfield')) 
                                            bg-green-50 text-green-700 font-semibold 
                                        @else 
                                            text-gray-700 hover:bg-gray-100 
                                        @endif">
                                    <i class="fas fa-futbol w-5"></i> {{-- Ikon lapangan --}}
                                    <span class="sidebar-text text-sm">Playfield</span>
                                </a>
                            </li>


                            <!-- <li>
                                <a href="#" class="flex items-center space-x-3 rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-chair w-5"></i> {{-- Ikon kursi --}}
                                    <span class="sidebar-text text-sm">Chair</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center space-x-3 rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cogs w-5"></i> {{-- Ikon mesin/logam --}}
                                    <span class="sidebar-text text-sm">Metal</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center space-x-3 rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-futbol w-5"></i> {{-- Ikon lapangan --}}
                                    <span class="sidebar-text text-sm">Playfield</span>
                                </a>
                            </li> -->
                        @endif
                        {{-- FINISHING --}}
                        @if(auth()->user()->role == 'finishing')
                            <li>
                                <a href="{{ route(auth()->user()->role.'.dashboard') }}"
                                   class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                   @if(request()->routeIs(auth()->user()->role.'.dashboard')) bg-green-50 text-green-700 font-semibold @else text-gray-700 hover:bg-gray-100 @endif">
                                    <i class="fas fa-home w-5"></i>
                                    <span class="sidebar-text fade-slide show text-sm">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('finishing.monitoring.produksi') }}"
                                   class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('finishing.monitoring.produksi')) bg-green-50 text-green-700 font-semibold @else text-gray-700 hover:bg-gray-100 @endif">
                                    <i class="fas fa-industry w-5"></i>
                                    <span class="sidebar-text fade-slide show text-sm">Monitoring Produksi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('finishing.report.buyer') }}"
                                   class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('finishing.report.buyer')) bg-green-50 text-green-700 font-semibold @else text-gray-700 hover:bg-gray-100 @endif">
                                    <i class="fas fa-users w-5"></i>
                                    <span class="sidebar-text fade-slide show text-sm">Report per Buyer</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('finishing.target.performance') }}"
                                   class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('finishing.target.performance')) bg-green-50 text-green-700 font-semibold @else text-gray-700 hover:bg-gray-100 @endif">
                                    <i class="fas fa-bullseye w-5"></i>
                                    <span class="sidebar-text fade-slide show text-sm">Target & Performance</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('finishing.laporan.periode') }}"
                                   class="flex items-center space-x-3 rounded-lg px-3 py-2 
                                   @if(request()->routeIs('finishing.laporan.periode')) bg-green-50 text-green-700 font-semibold @else text-gray-700 hover:bg-gray-100 @endif">
                                    <i class="fas fa-calendar-alt w-5"></i>
                                    <span class="sidebar-text fade-slide show text-sm">Laporan Periode</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
            <div class="mt-auto p-4 border-t border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="user-info sidebar-text fade-slide show">
                        <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ ucfirst(auth()->user()->role) }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center space-x-3 w-full text-left text-red-600 hover:bg-red-50 rounded-lg px-3 py-2 mt-2">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span class="logout-text sidebar-text fade-slide show">Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center space-x-4">
                    <button id="toggle-sidebar-desktop" class="text-gray-600 hover:text-gray-900 lg:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <button id="toggle-sidebar-collapse" class="text-gray-600 hover:text-gray-900 hidden lg:block">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="flex items-center space-x-3">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center overflow-hidden border border-gray-300 bg-white shadow-sm">
                            <img src="{{ asset('images/logo-kmi.png') }}"
                                 alt="Logo PT. KAYUMEBEL"
                                 class="w-full h-full object-contain p-1">
                        </div>
                        <div id="logo-text" class="fade-slide show leading-tight">
                            <h1 class="text-base font-bold text-gray-800">PT. Kayu Mebel Indonesia</h1>
                            <p class="text-xs text-gray-500">
                                {{ ucfirst(auth()->user()->role) }} Division Monitoring System
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">{{ now()->format('d M Y, H:i') }}</span>
                </div>
            </div>
        </header>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6 no-scrollbar">
            @yield('content')
        </main>
    </div>
</div>
<script>
    $(document).ready(function() {
        let sidebarCollapsed = false;
        
        // Toggle mobile sidebar
        $('#toggle-sidebar-desktop').click(function() {
            $('#sidebar').removeClass('-translate-x-full');
            $('#sidebar-overlay').removeClass('hidden');
        });
        
        $('#sidebar-overlay').click(function() {
            $('#sidebar').addClass('-translate-x-full');
            $('#sidebar-overlay').addClass('hidden');
        });
        
        // Toggle desktop sidebar collapse
        $('#toggle-sidebar-collapse').click(function() {
            sidebarCollapsed = !sidebarCollapsed;
            
            if (sidebarCollapsed) {
                $('#sidebar').removeClass('lg:w-64').addClass('lg:w-20');
                
                // // Hide sidebar texts but keep the unit produksi text visible
                // $('.sidebar-text:not(#unit-produksi)').removeClass('show');
                // setTimeout(() => {
                //     $('.sidebar-text:not(#unit-produksi)').hide();
                // }, 300);
                $('.sidebar-text').removeClass('show');
                setTimeout(() => {
                    $('.sidebar-text').hide();
                }, 300);
                
                $(this).find('i').removeClass('fa-bars').addClass('fa-xmark');
            } else {
                $('#sidebar').removeClass('lg:w-20').addClass('lg:w-64');
                
                // Show sidebar texts including unit produksi
                $('.sidebar-text').show();
                $('.sidebar-text').each(function(i, el) {
                    setTimeout(() => {
                        $(el).addClass('show');
                    }, i * 100);
                });
                
                $(this).find('i').removeClass('fa-xmark').addClass('fa-bars');
            }
        });
        
        // Handle window resize
        let lastWidth = $(window).width();
        $(window).on('resize', function() {
            const currentWidth = $(window).width();
            
            if (currentWidth >= 1024 && lastWidth < 1024) {
                // When transitioning from mobile to desktop view
                if (!sidebarCollapsed) {
                    $('#sidebar').removeClass('lg:w-20').addClass('lg:w-64');
                    $('#toggle-sidebar-collapse').find('i').removeClass('fa-xmark').addClass('fa-bars');
                    
                    // Ensure all sidebar texts are shown
                    $('.sidebar-text').show();
                    $('.sidebar-text').each(function(i, el) {
                        setTimeout(() => {
                            $(el).addClass('show');
                        }, i * 100);
                    });
                }
            } else if (currentWidth < 1024) {
                // Mobile view
                $('#sidebar').addClass('-translate-x-full');
                $('#sidebar-overlay').addClass('hidden');
            }
            
            lastWidth = currentWidth;
        });
    });
</script>
</body>
</html>