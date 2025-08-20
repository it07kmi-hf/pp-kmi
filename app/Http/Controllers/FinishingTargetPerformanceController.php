<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinishingTargetPerformanceController extends Controller
{
    public function index()
    {
        return view('dashboard.finishing.target-performance');
    }
}
