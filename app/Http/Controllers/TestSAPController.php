<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestSAP;
use Artisan;

class TestSAPController extends Controller
{
    // Tampilkan Blade dari MySQL langsung
    public function getPloPro()
    {
        $dbData = TestSAP::orderBy('no','desc')->paginate(20);
        return view('sap.index', compact('dbData'));
    }

    // Sinkron SAP di background (AJAX)
    public function syncSAPAjax()
    {
        Artisan::queue('sap:sync');
        return response()->json(['status' => 'ok']);
    }
}