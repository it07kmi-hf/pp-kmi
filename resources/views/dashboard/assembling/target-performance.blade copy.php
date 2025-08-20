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
    <!-- <div id="workCenter" class="tab-content hidden">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Work Center Control</h3>
            <p class="text-gray-600 mb-6">Control on/off status untuk setiap Work Center</p>

            <!-- Assembling Line 1 -->
            <div class="mb-6">
                <h4 class="text-sm font-medium text-gray-700 mb-4">Assembling Line 1</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <!-- Lifter A -->
                    <div class="border border-green-200 bg-green-50 rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-800">Lifter A</div>
                                <div class="text-xs text-gray-500">WC-A1-01</div>
                            </div>
                            <button class="toggle-switch" data-id="lifterA">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.12a1 1 0 00-.363 1.118l1.519 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.12a1 1 0 00-1.175 0l-3.976 2.12c-.783.57-1.838-.197-1.538-1.118l1.519-4.674a1 1 0 00-.363-1.118l-3.976-2.12c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-green-600 font-medium">On</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operator:</span>
                                <span class="text-gray-800">Budi Santoso</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Output:</span>
                                <span class="text-gray-800">45 unit</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Enabled:</span>
                                <span class="text-green-600">Ya</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lifter B -->
                    <div class="border border-green-200 bg-green-50 rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-800">Lifter B</div>
                                <div class="text-xs text-gray-500">WC-A1-02</div>
                            </div>
                            <button class="toggle-switch" data-id="lifterB">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.12a1 1 0 00-.363 1.118l1.519 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.12a1 1 0 00-1.175 0l-3.976 2.12c-.783.57-1.838-.197-1.538-1.118l1.519-4.674a1 1 0 00-.363-1.118l-3.976-2.12c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-green-600 font-medium">On</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operator:</span>
                                <span class="text-gray-800">Siti Rahayu</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Output:</span>
                                <span class="text-gray-800">52 unit</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Enabled:</span>
                                <span class="text-green-600">Ya</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lifter C -->
                    <div class="border border-red-200 bg-red-50 rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-800">Lifter C</div>
                                <div class="text-xs text-gray-500">WC-A1-03</div>
                            </div>
                            <button class="toggle-switch" data-id="lifterC">
                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.12a1 1 0 00-.363 1.118l1.519 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.12a1 1 0 00-1.175 0l-3.976 2.12c-.783.57-1.838-.197-1.538-1.118l1.519-4.674a1 1 0 00-.363-1.118l-3.976-2.12c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-red-600 font-medium">Off</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operator:</span>
                                <span class="text-red-600">Ahmad Wijaya</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Output:</span>
                                <span class="text-red-600">28 unit</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Enabled:</span>
                                <span class="text-green-600">Ya</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lifter D -->
                    <div class="border border-green-200 bg-green-50 rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-800">Lifter D</div>
                                <div class="text-xs text-gray-500">WC-A1-04</div>
                            </div>
                            <button class="toggle-switch" data-id="lifterD">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.12a1 1 0 00-.363 1.118l1.519 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.12a1 1 0 00-1.175 0l-3.976 2.12c-.783.57-1.838-.197-1.538-1.118l1.519-4.674a1 1 0 00-.363-1.118l-3.976-2.12c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-green-600 font-medium">On</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operator:</span>
                                <span class="text-gray-800">Dewi Saritika</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Output:</span>
                                <span class="text-gray-800">48 unit</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Enabled:</span>
                                <span class="text-green-600">Ya</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lifter E -->
                    <div class="border border-green-200 bg-green-50 rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-800">Lifter E</div>
                                <div class="text-xs text-gray-500">WC-A1-05</div>
                            </div>
                            <button class="toggle-switch" data-id="lifterE">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.12a1 1 0 00-.363 1.118l1.519 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.12a1 1 0 00-1.175 0l-3.976 2.12c-.783.57-1.838-.197-1.538-1.118l1.519-4.674a1 1 0 00-.363-1.118l-3.976-2.12c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-green-600 font-medium">On</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operator:</span>
                                <span class="text-gray-800">Rudi Hermawan</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Output:</span>
                                <span class="text-gray-800">43 unit</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Enabled:</span>
                                <span class="text-green-600">Ya</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lifter F -->
                    <div class="border border-green-200 bg-green-50 rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-800">Lifter F</div>
                                <div class="text-xs text-gray-500">WC-A1-06</div>
                            </div>
                            <button class="toggle-switch" data-id="lifterF">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.12a1 1 0 00-.363 1.118l1.519 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.12a1 1 0 00-1.175 0l-3.976 2.12c-.783.57-1.838-.197-1.538-1.118l1.519-4.674a1 1 0 00-.363-1.118l-3.976-2.12c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-green-600 font-medium">On</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operator:</span>
                                <span class="text-gray-800">Indah Permata</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Output:</span>
                                <span class="text-gray-800">54 unit</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Enabled:</span>
                                <span class="text-green-600">Ya</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lifter G -->
                    <div class="border border-red-200 bg-red-50 rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-800">Lifter G</div>
                                <div class="text-xs text-gray-500">WC-A1-07</div>
                            </div>
                            <button class="toggle-switch" data-id="lifterG">
                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.12a1 1 0 00-.363 1.118l1.519 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.12a1 1 0 00-1.175 0l-3.976 2.12c-.783.57-1.838-.197-1.538-1.118l1.519-4.674a1 1 0 00-.363-1.118l-3.976-2.12c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-red-600 font-medium">Off</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operator:</span>
                                <span class="text-red-600">Eko Prasetyo</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Output:</span>
                                <span class="text-red-600">25 unit</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Enabled:</span>
                                <span class="text-green-600">Ya</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lifter H -->
                    <div class="border border-green-200 bg-green-50 rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-800">Lifter H</div>
                                <div class="text-xs text-gray-500">WC-A1-08</div>
                            </div>
                            <button class="toggle-switch" data-id="lifterH">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.12a1 1 0 00-.363 1.118l1.519 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.12a1 1 0 00-1.175 0l-3.976 2.12c-.783.57-1.838-.197-1.538-1.118l1.519-4.674a1 1 0 00-.363-1.118l-3.976-2.12c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-green-600 font-medium">On</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operator:</span>
                                <span class="text-gray-800">Maya Sari</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Output:</span>
                                <span class="text-gray-800">58 unit</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Enabled:</span>
                                <span class="text-green-600">Ya</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lifter I -->
                    <div class="border border-green-200 bg-green-50 rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-800">Lifter I</div>
                                <div class="text-xs text-gray-500">WC-A1-09</div>
                            </div>
                            <button class="toggle-switch" data-id="lifterI">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.12a1 1 0 00-.363 1.118l1.519 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.12a1 1 0 00-1.175 0l-3.976 2.12c-.783.57-1.838-.197-1.538-1.118l1.519-4.674a1 1 0 00-.363-1.118l-3.976-2.12c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-green-600 font-medium">On</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operator:</span>
                                <span class="text-gray-800">Agus Setiawan</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Output:</span>
                                <span class="text-gray-800">46 unit</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Enabled:</span>
                                <span class="text-green-600">Ya</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lifter J -->
                    <div class="border border-green-200 bg-green-50 rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-800">Lifter J</div>
                                <div class="text-xs text-gray-500">WC-A1-10</div>
                            </div>
                            <button class="toggle-switch" data-id="lifterJ">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.12a1 1 0 00-.363 1.118l1.519 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.12a1 1 0 00-1.175 0l-3.976 2.12c-.783.57-1.838-.197-1.538-1.118l1.519-4.674a1 1 0 00-.363-1.118l-3.976-2.12c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-green-600 font-medium">On</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operator:</span>
                                <span class="text-gray-800">Ratna Dewi</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Output:</span>
                                <span class="text-gray-800">51 unit</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Enabled:</span>
                                <span class="text-green-600">Ya</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lifter K -->
                    <div class="border border-red-200 bg-red-50 rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-800">Lifter K</div>
                                <div class="text-xs text-gray-500">WC-A1-11</div>
                            </div>
                            <button class="toggle-switch" data-id="lifterK">
                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.12a1 1 0 00-.363 1.118l1.519 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.12a1 1 0 00-1.175 0l-3.976 2.12c-.783.57-1.838-.197-1.538-1.118l1.519-4.674a1 1 0 00-.363-1.118l-3.976-2.12c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-red-600 font-medium">Off</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operator:</span>
                                <span class="text-red-600">Hendro Susilo</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Output:</span>
                                <span class="text-red-600">18 unit</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Enabled:</span>
                                <span class="text-red-600">Tidak</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lifter L -->
                    <div class="border border-green-200 bg-green-50 rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-800">Lifter L</div>
                                <div class="text-xs text-gray-500">WC-A1-12</div>
                            </div>
                            <button class="toggle-switch" data-id="lifterL">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.12a1 1 0 00-.363 1.118l1.519 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.12a1 1 0 00-1.175 0l-3.976 2.12c-.783.57-1.838-.197-1.538-1.118l1.519-4.674a1 1 0 00-.363-1.118l-3.976-2.12c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-green-600 font-medium">On</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operator:</span>
                                <span class="text-gray-800">Lestari Wati</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Output:</span>
                                <span class="text-gray-800">53 unit</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Enabled:</span>
                                <span class="text-green-600">Ya</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

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

        // Performance Chart
        new Chart(document.getElementById('performanceChart').getContext('2d'), {
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
        new Chart(document.getElementById('historicalChart').getContext('2d'), {
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
    });
</script>
@endsection