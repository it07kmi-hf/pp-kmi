@extends('layouts.app')

@section('title', 'Login - PT. KAYU MEBEL INDONESIA')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 to-white px-4">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-green-50 p-3 rounded-xl mx-auto mb-4 flex items-center justify-center">
                <img src="{{ asset('images/logo-kmi.png') }}"
                    alt="Logo PT. KAYU MEBEL"
                    class="w-full h-full object-contain">
            </div>
            <h1 class="text-xl font-bold text-green-600">PT. KAYU MEBEL INDONESIA</h1>
            <p class="text-gray-600 text-sm mt-2">Dashboard PP - Monitoring Output Production</p>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ url('/login') }}" class="space-y-6">
            @csrf

            <!-- Username Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <input type="email"
                    id="email"
                    name="email"
                    required
                    value="{{ old('email') }}"
                    placeholder="Masukkan username"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password"
                    id="password"
                    name="password"
                    required
                    placeholder="Masukkan password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md">
                @foreach ($errors->all() as $error)
                <p class="text-sm">{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-1 px-4 rounded-md transition duration-200">
                Login
            </button>
        </form>

        <!-- Demo Account Info -->
        <div class="mt-8 text-center">
            <p class="text-gray-600 text-sm">Demo: sesuaikan (...@kmi.com) / 123admin</p>
        </div>
    </div>
</div>
@endsection