<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevisiAssemblingDashboardController extends Controller
{
    public function devisiassemblingDashboard()
    {
        return view('dashboard.devisiassembling.dashboard');
    }
}