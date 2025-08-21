@extends('layouts.app')

@section('title', 'Login - PT. KAYU MEBEL INDONESIA')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 to-white px-4">
    <div class="w-full max-w-5xl bg-white rounded-lg shadow-lg grid grid-cols-1 md:grid-cols-2 overflow-hidden">
        
        <!-- Kolom Kiri: Login Form -->
        <div class="p-8">
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
                        placeholder="Enter your username"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password"
                        id="password"
                        name="password"
                        required
                        placeholder="Enter your password"
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
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                    Login
                </button>
            </form>
        </div>

        <!-- Kolom Kanan: Demo Accounts -->
        <div class="bg-green-50 p-8 border-l border-gray-200">
            <h2 class="text-lg font-semibold text-green-700 mb-4">Demo Accounts</h2>
            <p class="text-sm text-gray-600 mb-4">Use the following credentials to login:</p>
            <div class="space-y-3 text-sm">
                <div class="p-3 bg-white rounded-md shadow-sm border">
                    <p><span class="font-semibold">Admin:</span> admin@kmi.com / 123admin</p>
                </div>
                <div class="p-3 bg-white rounded-md shadow-sm border">
                    <p><span class="font-semibold">Pembahanan:</span> pembahanan@kmi.com / 123admin</p>
                </div>
                <div class="p-3 bg-white rounded-md shadow-sm border">
                    <p><span class="font-semibold">Machinning:</span> machinning@kmi.com / 123admin</p>
                </div>
                <div class="p-3 bg-white rounded-md shadow-sm border">
                    <p><span class="font-semibold">Assembling:</span> assembling@kmi.com / 123admin</p>
                </div>
                <div class="p-3 bg-white rounded-md shadow-sm border">
                    <p><span class="font-semibold">Finishing:</span> finishing@kmi.com / 123admin</p>
                </div>
                <div class="p-3 bg-white rounded-md shadow-sm border">
                    <p><span class="font-semibold">Packing:</span> packing@kmi.com / 123admin</p>
                </div>
                <div class="p-3 bg-white rounded-md shadow-sm border">
                    <p><span class="font-semibold">Devisi Assembling:</span> devisiassembling@kmi.com / 123admin</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
