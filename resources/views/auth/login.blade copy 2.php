@extends('layouts.app')

@section('title', 'Login - PT. KAYU MEBEL INDONESIA')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="w-full max-w-sm bg-white rounded-lg shadow-lg overflow-hidden">

        <!-- Header Hijau -->
        <div class="bg-green-200 text-center p-6">
            <div class="w-14 h-14 bg-white p-2.5 rounded-lg mx-auto mb-3 flex items-center justify-center shadow">
                <img src="{{ asset('images/logo-kmi.png') }}"
                    alt="Logo PT. KAYU MEBEL"
                    class="w-full h-full object-contain">
            </div>
            <h1 class="text-base font-bold text-gray-800">Dashboard Monitoring PO</h1>
            <p class="text-gray-600 text-xs mt-1">PT. KAYU MEBEL INDONESIA</p>
        </div>

        <!-- Body -->
        <div class="p-6">
            <!-- Form Login -->
            <form method="POST" action="{{ url('/login') }}" class="space-y-4">
                @csrf

                <!-- Username -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="email"
                        id="email"
                        name="email"
                        required
                        value="{{ old('email') }}"
                        placeholder="Masukkan username"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md 
                               focus:outline-none focus:ring-1 focus:ring-green-500 
                               focus:border-green-500 text-sm">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password"
                        id="password"
                        name="password"
                        required
                        placeholder="Masukkan password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md 
                               focus:outline-none focus:ring-1 focus:ring-green-500 
                               focus:border-green-500 text-sm">
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-3 py-2 rounded-md text-xs">
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <!-- Tombol Login -->
                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 
                           text-white font-medium py-2 rounded-md 
                           transition duration-200 text-sm">
                    Masuk
                </button>
            </form>

            <!-- Demo Credentials -->
            <div class="text-center mt-5 text-xs text-gray-600">
                <p>Demo Credentials:</p>
                <p>Username: <span class="font-semibold text-green-600">admin</span></p>
                <p>Password: <span class="font-semibold text-green-600">admin123</span></p>
            </div>
        </div>
    </div>
</div>
@endsection
