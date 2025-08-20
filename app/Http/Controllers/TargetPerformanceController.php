<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TargetPerformanceController extends Controller
{
    public function index()
    {
        // Ganti dengan nama view yang sesuai
        return view('dashboard.assembling.target-performance');
    }
}
