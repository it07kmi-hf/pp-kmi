<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportBuyerController extends Controller
{
    // PASTIKAN METHOD INI ADA
    public function index()
    {
        return view('dashboard.assembling.report-buyer');
    }
}
