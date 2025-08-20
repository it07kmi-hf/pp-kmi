<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssemblingTargetPerformanceController extends Controller
{
    public function index()
    {
        return view('dashboard.assembling.target-performance');
    }
}
