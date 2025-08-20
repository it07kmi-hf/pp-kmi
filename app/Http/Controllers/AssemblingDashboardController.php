<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssemblingDashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('dashboard.admin.dashboard');
    }
    public function pembahannanDashboard()
    {
        return view('dashboard.pembahanan.dashboard');
    }

    public function machinningDashboard()
    {
        return view('dashboard.machinning.dashboard');
    }

    public function assemblingDashboard()
    {
        return view('dashboard.assembling.dashboard');
    }

    public function finishingDashboard()
    {
        return view('dashboard.finishing.dashboard');
    }

    public function packingDashboard()
    {
        return view('dashboard.packing.dashboard');
    }
}