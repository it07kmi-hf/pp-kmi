@extends('layouts.app')

@section('title', 'Login - PT. KAYUMEBEL INDONESIA')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 to-green-100">
    <div class="max-w-md w-full">
        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Logo and Company Info -->
            <div class="text-center mb-8">
                <div class="mx-auto w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-leaf text-white text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">PT. KAYUMEBEL INDONESIA</h1>
                <p class="text-gray-600 text-sm">Assembling Division Monitoring System</p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ url('/login') }}" class="space-y-6">
                @csrf
                
                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input 
                        id="username" 
                        name="username" 
                        type="text" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200" 
                        placeholder="Masukkan username"
                        value="{{ old('username') }}"
                    >
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200" 
                        placeholder="Masukkan password"
                    >
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        @foreach ($errors->all() as $error)
                            <p class="text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Login Button -->
                <div>
                    <button 
                        type="submit" 
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-105"
                    >
                        Login
                    </button>
                </div>
            </form>

            <!-- Demo Accounts -->
            <div class="mt-8 bg-gray-50 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Demo: admin / admin123</h3>
                <div class="grid grid-cols-1 gap-2 text-xs">
                    <div class="bg-white p-2 rounded border flex justify-between">
                        <span class="font-medium">Pembahanan:</span>
                        <span class="text-gray-600">pembahanan@kmi.com</span>
                    </div>
                    <div class="bg-white p-2 rounded border flex justify-between">
                        <span class="font-medium">Machinning:</span>
                        <span class="text-gray-600">machinning@kmi.com</span>
                    </div>
                    <div class="bg-white p-2 rounded border flex justify-between">
                        <span class="font-medium">Assembling:</span>
                        <span class="text-gray-600">assembling@kmi.com</span>
                    </div>
                    <div class="bg-white p-2 rounded border flex justify-between">
                        <span class="font-medium">Finishing:</span>
                        <span class="text-gray-600">finishing@kmi.com</span>
                    </div>
                    <div class="bg-white p-2 rounded border flex justify-between">
                        <span class="font-medium">Packing:</span>
                        <span class="text-gray-600">packing@kmi.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection