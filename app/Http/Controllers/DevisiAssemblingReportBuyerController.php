<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevisiAssemblingReportBuyerController extends Controller
{
    // PASTIKAN METHOD INI ADA
    public function index()
    {
        return view('dashboard.devisiassembling.report-buyer');
    }
}
