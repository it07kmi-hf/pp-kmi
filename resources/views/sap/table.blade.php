<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-800 text-white sticky top-0">
        <tr class="text-center">
            <th class="px-3 py-2 text-sm font-medium">No</th>
            <th class="px-3 py-2 text-sm font-medium">Product</th>
            <th class="px-3 py-2 text-sm font-medium">Deskripsi Produk</th>
            <th class="px-3 py-2 text-sm font-medium">Sales Order</th>
            <th class="px-3 py-2 text-sm font-medium">Item</th>
            <th class="px-3 py-2 text-sm font-medium">Order Produksi</th>
            <th class="px-3 py-2 text-sm font-medium">Material</th>
            <th class="px-3 py-2 text-sm font-medium">Deskripsi Material</th>
            <th class="px-3 py-2 text-sm font-medium">Plant</th>
            <th class="px-3 py-2 text-sm font-medium">MRP</th>
            <th class="px-3 py-2 text-sm font-medium">Qty Plan Produksi</th>
            <th class="px-3 py-2 text-sm font-medium">Qty Delivery</th>
            <th class="px-3 py-2 text-sm font-medium">Sisa</th>
            <th class="px-3 py-2 text-sm font-medium">Satuan</th>
            <th class="px-3 py-2 text-sm font-medium">Start Date</th>
            <th class="px-3 py-2 text-sm font-medium">Finish Date</th>
            <th class="px-3 py-2 text-sm font-medium">Create On</th>
            <th class="px-3 py-2 text-sm font-medium">Hari</th>
            <th class="px-3 py-2 text-sm font-medium">Overdue</th>
            <th class="px-3 py-2 text-sm font-medium">Panjang</th>
            <th class="px-3 py-2 text-sm font-medium">System Status</th>
            <th class="px-3 py-2 text-sm font-medium">Selisih Qty</th>
            <th class="px-3 py-2 text-sm font-medium">Status Produksi</th>
            <th class="px-3 py-2 text-sm font-medium">First Conf Date</th>
            <th class="px-3 py-2 text-sm font-medium">Deadline</th>
            <th class="px-3 py-2 text-sm font-medium">Require Time</th>
            <th class="px-3 py-2 text-sm font-medium">Unit Requirement</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse($dbData as $row)
        <tr class="text-sm text-gray-700">
            <td class="px-3 py-2 text-center">{{ $row->no }}</td>
            <td class="px-3 py-2">{{ $row->product }}</td>
            <td class="px-3 py-2">{{ $row->product_desc }}</td>
            <td class="px-3 py-2">{{ $row->sales_order }}</td>
            <td class="px-3 py-2 text-center">{{ $row->item }}</td>
            <td class="px-3 py-2">{{ $row->aufnr }}</td>
            <td class="px-3 py-2">{{ $row->material }}</td>
            <td class="px-3 py-2">{{ $row->material_desc }}</td>
            <td class="px-3 py-2">{{ $row->plant }}</td>
            <td class="px-3 py-2">{{ $row->mrp }}</td>
            <td class="px-3 py-2 text-right">{{ number_format($row->qty_plo_pro,3) }}</td>
            <td class="px-3 py-2 text-right">{{ number_format($row->qty_delivery,3) }}</td>
            <td class="px-3 py-2 text-right">{{ number_format($row->outstanding,3) }}</td>
            <td class="px-3 py-2">{{ $row->uom }}</td>
            <td class="px-3 py-2">{{ $row->start_date?->format('d-m-Y') }}</td>
            <td class="px-3 py-2">{{ $row->finish_date?->format('d-m-Y') }}</td>
            <td class="px-3 py-2">{{ $row->create_on?->format('d-m-Y') }}</td>
            <td class="px-3 py-2">{{ $row->hari }}</td>
            <td class="px-3 py-2 text-center">{{ $row->overdue }}</td>
            <td class="px-3 py-2">{{ $row->panjang }}</td>
            <td class="px-3 py-2">{{ $row->system_status }}</td>
            <td class="px-3 py-2 text-right">{{ number_format($row->selisih,3) }}</td>
            <td class="px-3 py-2">{{ $row->status }}</td>
            <td class="px-3 py-2">{{ $row->first_conf_date?->format('d-m-Y') }}</td>
            <td class="px-3 py-2">{{ $row->deadline?->format('d-m-Y') }}</td>
            <td class="px-3 py-2">{{ $row->require_time }}</td>
            <td class="px-3 py-2">{{ $row->keinh }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="27" class="text-center py-4 text-gray-400">Belum ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>
