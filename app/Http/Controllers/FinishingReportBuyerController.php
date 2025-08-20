<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinishingReportBuyerController extends Controller
{
    // PASTIKAN METHOD INI ADA
    public function index()
    {
        return view('dashboard.finishing.report-buyer');
    }
}
