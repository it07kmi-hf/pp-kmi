@extends('layouts.dashboard')
@section('title', 'Dashboard Assembling')
@section('page-title', 'Dashboard Monitoring Assembling')
@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
  <!-- Header Section -->
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Assembling Monitoring</h1>
    <div class="flex space-x-2">
      <button class="px-3 py-1 text-sm rounded-md bg-white border border-gray-200">Harian</button>
      <button class="px-3 py-1 text-sm rounded-md bg-white border border-gray-200">Mingguan</button>
      <button class="px-3 py-1 text-sm rounded-md bg-white border border-gray-200">Bulanan</button>
      <button id="filterBtn" class="px-3 py-1 text-sm rounded-md bg-white border border-gray-200 flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
        </svg>
        Filter Periode Khusus
      </button>
    </div>
  </div>

  <!-- Metrics Cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
      <div class="flex justify-between items-start">
        <div>
          <p class="text-sm text-gray-500 mb-1">Total Output</p>
          <h2 class="text-2xl font-bold text-gray-800">1,632</h2>
          <p class="text-xs text-gray-400">pieces (Harian)</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
        </svg>
      </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
      <div class="flex justify-between items-start">
        <div>
          <p class="text-sm text-gray-500 mb-1">Total Value</p>
          <h2 class="text-2xl font-bold text-gray-800">$131,050</h2>
          <p class="text-xs text-gray-400">USD (Harian)</p>
        </div>
        <span class="text-gray-400">$</span>
      </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
      <div class="flex justify-between items-start">
        <div>
          <p class="text-sm text-gray-500 mb-1">Active Units</p>
          <h2 class="text-2xl font-bold text-gray-800">7</h2>
          <p class="text-xs text-gray-400">production units</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
        </svg>
      </div>
    </div>
  </div>

  <!-- Production Unit Overview -->
  <div class="mb-6">
    <div class="flex items-center gap-2 mb-4">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
      </svg>
      <h2 class="font-medium text-gray-700">Unit Produksi Overview</h2>
      <span class="text-sm text-gray-500">Harian</span>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <!-- Casegood D1 -->
      <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
        <div class="flex justify-between items-center mb-4">
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
            </svg>
            <span class="font-medium text-gray-800">Casegood D1</span>
          </div>
          <span class="text-xs text-gray-500">6 WC</span>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016a11.955 11.955 0 01-8.618 3.04M11 14l2 2m0 0l2-2m-2-2l-2 2m2.618-4.016A11.955 11.955 0 0112 2.944" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Quantity</p>
            <p class="font-semibold text-gray-800">268</p>
          </div>
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Value</p>
            <p class="font-semibold text-gray-800">$13,400</p>
          </div>
        </div>
      </div>

      <!-- Casegood D2 -->
      <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
        <div class="flex justify-between items-center mb-4">
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
            </svg>
            <span class="font-medium text-gray-800">Casegood D2</span>
          </div>
          <span class="text-xs text-gray-500">6 WC</span>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016a11.955 11.955 0 01-8.618 3.04M11 14l2 2m0 0l2-2m-2-2l-2 2m2.618-4.016A11.955 11.955 0 0112 2.944" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Quantity</p>
            <p class="font-semibold text-gray-800">278</p>
          </div>
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Value</p>
            <p class="font-semibold text-gray-800">$13,900</p>
          </div>
        </div>
      </div>

      <!-- Casegood D3 -->
      <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
        <div class="flex justify-between items-center mb-4">
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
            </svg>
            <span class="font-medium text-gray-800">Casegood D3</span>
          </div>
          <span class="text-xs text-gray-500">6 WC</span>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016a11.955 11.955 0 01-8.618 3.04M11 14l2 2m0 0l2-2m-2-2l-2 2m2.618-4.016A11.955 11.955 0 0112 2.944" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Quantity</p>
            <p class="font-semibold text-gray-800">288</p>
          </div>
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Value</p>
            <p class="font-semibold text-gray-800">$14,400</p>
          </div>
        </div>
      </div>

      <!-- Casegood D4 -->
      <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
        <div class="flex justify-between items-center mb-4">
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
            </svg>
            <span class="font-medium text-gray-800">Casegood D4</span>
          </div>
          <span class="text-xs text-gray-500">6 WC</span>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016a11.955 11.955 0 01-8.618 3.04M11 14l2 2m0 0l2-2m-2-2l-2 2m2.618-4.016A11.955 11.955 0 0112 2.944" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Quantity</p>
            <p class="font-semibold text-gray-800">285</p>
          </div>
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Value</p>
            <p class="font-semibold text-gray-800">$14,250</p>
          </div>
        </div>
      </div>

      <!-- Chair -->
      <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
        <div class="flex justify-between items-center mb-4">
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
            </svg>
            <span class="font-medium text-gray-800">Chair</span>
          </div>
          <span class="text-xs text-gray-500">6 WC</span>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016a11.955 11.955 0 01-8.618 3.04M11 14l2 2m0 0l2-2m-2-2l-2 2m2.618-4.016A11.955 11.955 0 0112 2.944" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Quantity</p>
            <p class="font-semibold text-gray-800">235</p>
          </div>
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Value</p>
            <p class="font-semibold text-gray-800">$23,500</p>
          </div>
        </div>
      </div>

      <!-- Metal -->
      <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
        <div class="flex justify-between items-center mb-4">
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
            </svg>
            <span class="font-medium text-gray-800">Metal</span>
          </div>
          <span class="text-xs text-gray-500">6 WC</span>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016a11.955 11.955 0 01-8.618 3.04M11 14l2 2m0 0l2-2m-2-2l-2 2m2.618-4.016A11.955 11.955 0 0112 2.944" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Quantity</p>
            <p class="font-semibold text-gray-800">179</p>
          </div>
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Value</p>
            <p class="font-semibold text-gray-800">$26,850</p>
          </div>
        </div>
      </div>

      <!-- Playfield -->
      <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
        <div class="flex justify-between items-center mb-4">
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
            </svg>
            <span class="font-medium text-gray-800">Playfield</span>
          </div>
          <span class="text-xs text-gray-500">6 WC</span>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016a11.955 11.955 0 01-8.618 3.04M11 14l2 2m0 0l2-2m-2-2l-2 2m2.618-4.016A11.955 11.955 0 0112 2.944" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Quantity</p>
            <p class="font-semibold text-gray-800">99</p>
          </div>
          <div class="text-center">
            <div class="flex justify-center mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
              </svg>
            </div>
            <p class="text-xs text-gray-500">Value</p>
            <p class="font-semibold text-gray-800">$24,750</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Filter Modal (Hidden by Default) -->
  <div id="filterModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-medium text-gray-800">Filter Periode Khusus</h3>
        <button onclick="closeFilter()" class="text-gray-400 hover:text-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      
      <p class="text-sm text-gray-600 mb-4">Analisa data periode tertentu</p>
      
      <!-- Tab Navigation -->
      <div class="flex border-b mb-4">
        <button class="py-2 px-4 text-sm font-medium text-green-600 border-b-2 border-green-600">Bulan Spesifik</button>
        <button class="py-2 px-4 text-sm font-medium text-gray-500">Range Tanggal</button>
      </div>
      
      <!-- Bulan Spesifik Tab Content -->
      <div class="tab-content">
        <div class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Bulan</label>
            <select class="w-full p-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
              <option>Agustus</option>
              <option>Juli</option>
              <option>Juni</option>
            </select>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
            <select class="w-full p-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
              <option>2025</option>
              <option>2024</option>
              <option>2023</option>
            </select>
          </div>
        </div>
        
        <div class="flex space-x-3 mt-6">
          <button class="flex-1 bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition-colors">Terapkan Filter</button>
          <button onclick="closeFilter()" class="flex-1 bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300 transition-colors">Batal</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Fungsi untuk menampilkan/menyembunyikan modal filter
function toggleFilter() {
  const modal = document.getElementById('filterModal');
  modal.classList.toggle('hidden');
}

// Fungsi untuk menutup modal
function closeFilter() {
  const modal = document.getElementById('filterModal');
  modal.classList.add('hidden');
}

// Event listener untuk tombol filter
document.getElementById('filterBtn').addEventListener('click', toggleFilter);
</script>
@endsection