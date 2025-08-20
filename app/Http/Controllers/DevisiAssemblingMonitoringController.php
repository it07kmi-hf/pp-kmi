<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevisiAssemblingMonitoringController extends Controller
{
    public function index()
    {
        return view('dashboard.devisiassembling.monitoring-produksi');

    }

    public function getByLine($line)
    {
        // Dummy data per line
        $data = [
            1 => [
                'output' => 120,
                'target' => 150,
                'performance' => '80%',
                'pro_orders' => [
                    ['no' => 'PO-1001', 'item' => 'Kursi Kayu', 'qty' => 50, 'status' => 'Selesai'],
                    ['no' => 'PO-1002', 'item' => 'Meja Tamu', 'qty' => 70, 'status' => 'Proses'],
                ]
            ],
            2 => [
                'output' => 95,
                'target' => 140,
                'performance' => '68%',
                'pro_orders' => [
                    ['no' => 'PO-2001', 'item' => 'Lemari Minimalis', 'qty' => 40, 'status' => 'Proses'],
                    ['no' => 'PO-2002', 'item' => 'Rak Buku', 'qty' => 55, 'status' => 'Pending'],
                ]
            ],
            3 => [
                'output' => 180,
                'target' => 160,
                'performance' => '112%',
                'pro_orders' => [
                    ['no' => 'PO-3001', 'item' => 'Sofa Set', 'qty' => 80, 'status' => 'Selesai'],
                    ['no' => 'PO-3002', 'item' => 'Bangku Panjang', 'qty' => 100, 'status' => 'Selesai'],
                ]
            ],
            4 => [
                'output' => 60,
                'target' => 100,
                'performance' => '60%',
                'pro_orders' => [
                    ['no' => 'PO-4001', 'item' => 'Tempat Tidur', 'qty' => 30, 'status' => 'Proses'],
                    ['no' => 'PO-4002', 'item' => 'Meja Kerja', 'qty' => 30, 'status' => 'Pending'],
                ]
            ],
        ];

        return response()->json($data[$line] ?? []);
    }
}
