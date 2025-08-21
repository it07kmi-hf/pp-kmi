@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">

<div class="container mx-auto my-8 px-2 sm:px-4">
    <h2 class="text-2xl font-bold text-center mb-6">📊 Data PLOPRO dari SAP</h2>

    <!-- Notifikasi -->
    <div id="notif" class="hidden fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50"></div>

    <div class="overflow-x-auto max-h-[600px] border border-gray-300 rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-800 text-white sticky top-0">
                <tr class="text-center text-sm sm:text-base">
                    <th class="px-2 py-2">#</th>
                    <th class="px-2 py-2">No</th>
                    <th class="px-2 py-2">Product</th>
                    <th class="px-2 py-2">Deskripsi Produk</th>
                    <th class="px-2 py-2">Sales Order</th>
                    <th class="px-2 py-2">Item</th>
                    <th class="px-2 py-2">Order Produksi</th>
                    <th class="px-2 py-2">Material</th>
                    <th class="px-2 py-2">Deskripsi Material</th>
                    <th class="px-2 py-2">Plant</th>
                    <th class="px-2 py-2">MRP</th>
                    <th class="px-2 py-2">Qty Plan</th>
                    <th class="px-2 py-2">Qty Delivery</th>
                    <th class="px-2 py-2">Sisa</th>
                    <th class="px-2 py-2">UOM</th>
                    <th class="px-2 py-2">Start Date</th>
                    <th class="px-2 py-2">Finish Date</th>
                    <th class="px-2 py-2">Create On</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-xs sm:text-sm">
                @forelse($dbData as $index => $row)
                    <tr>
                        <td class="px-2 py-1 text-center">{{ $dbData->firstItem() + $index }}</td>
                        <td class="px-2 py-1 text-center">{{ $row->no }}</td>
                        <td class="px-2 py-1">{{ $row->product }}</td>
                        <td class="px-2 py-1">{{ $row->product_desc }}</td>
                        <td class="px-2 py-1">{{ $row->sales_order }}</td>
                        <td class="px-2 py-1 text-center">{{ $row->item }}</td>
                        <td class="px-2 py-1">{{ $row->aufnr }}</td>
                        <td class="px-2 py-1">{{ $row->material }}</td>
                        <td class="px-2 py-1">{{ $row->material_desc }}</td>
                        <td class="px-2 py-1 text-center">{{ $row->plant }}</td>
                        <td class="px-2 py-1">{{ $row->mrp }}</td>
                        <td class="px-2 py-1 text-right">{{ $row->qty_plo_pro }}</td>
                        <td class="px-2 py-1 text-right">{{ $row->qty_delivery }}</td>
                        <td class="px-2 py-1 text-right">{{ $row->outstanding }}</td>
                        <td class="px-2 py-1 text-center">{{ $row->uom }}</td>
                        <td class="px-2 py-1 text-center">{{ $row->start_date }}</td>
                        <td class="px-2 py-1 text-center">{{ $row->finish_date }}</td>
                        <td class="px-2 py-1 text-center">{{ $row->create_on }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="18" class="text-center py-4">Data kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 flex justify-center">
        {{ $dbData->links('pagination::tailwind') }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Sinkron SAP di background tiap 60 detik
    setInterval(() => {
        axios.get('/sap/update')
            .then(res => {
                if (res.data.newData > 0) {
                    let notif = document.getElementById('notif');
                    notif.innerText = res.data.newData + " data baru berhasil ditambahkan 🚀";
                    notif.classList.remove('hidden');
                    setTimeout(() => notif.classList.add('hidden'), 4000);
                }
            })
            .catch(err => console.error(err));
    }, 60000);
</script>
@endsection
