@extends('layouts.dashboard')

@section('title', 'Report Buyer')
@section('page-title', 'Report Buyer Assembling')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Report Buyer Assembling</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Buyer</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @for ($i = 1; $i <= 20; $i++)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $i }}</td>
                            <td class="px-4 py-2">Buyer {{ $i }}</td>
                            <td class="px-4 py-2">Product {{ $i }}</td>
                            <td class="px-4 py-2">{{ rand(1, 50) }}</td>
                            <td class="px-4 py-2">{{ date('d-m-Y') }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded-full text-white {{ $i % 2 == 0 ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $i % 2 == 0 ? 'Completed' : 'Pending' }}
                                </span>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
