@extends('layouts.dashboard')

@section('title', 'Dashboard Machinning')
@section('page-title', 'Dashboard Machinning')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            Selamat Datang di Dashboard Machinning
        </h1>
        <p class="text-gray-600">
            Kelola proses machinning dan monitor aktivitas divisi Anda.
        </p>

        <!-- Notifikasi Pengembangan -->
        <p class="mt-4 text-center text-sm font-semibold text-yellow-700 bg-yellow-100 border border-yellow-300 px-4 py-2 rounded-md 
                  animate-pulse">
            🚧 Fitur ini masih dalam tahap pengembangan — Nantikan update selanjutnya 🚀
        </p>
    </div>
</div>
@endsection
