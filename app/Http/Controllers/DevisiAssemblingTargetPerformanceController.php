<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevisiAssemblingTargetPerformanceController extends Controller
{
    public function index()
    {
        return view('dashboard.devisiassembling.target-performance');
    }
}
