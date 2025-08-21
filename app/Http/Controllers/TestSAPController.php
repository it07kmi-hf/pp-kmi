<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestSAP;
use Artisan;

class TestSAPController extends Controller
{
    public function getPloPro()
    {
        $dbData = TestSAP::orderBy('no','desc')->paginate(20);
        return view('sap.index', compact('dbData'));
    }

    public function syncSAPAjax()
    {
        // Jalankan sync
        Artisan::call('sap:sync');

        // Hitung tambahan data baru (selama 1 menit terakhir)
        $newData = TestSAP::where('created_at', '>=', now()->subMinute())->count();

        return response()->json([
            'status' => 'ok',
            'newData' => $newData
        ]);
    }
}
