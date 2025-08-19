<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('dashboard.admin');
    }
    public function pembahannanDashboard()
    {
        return view('dashboard.pembahanan');
    }

    public function machinningDashboard()
    {
        return view('dashboard.machinning');
    }

    public function asemmblingDashboard()
    {
        return view('dashboard.asemmbling');
    }

    public function finishingDashboard()
    {
        return view('dashboard.finishing');
    }

    public function packingDashboard()
    {
        return view('dashboard.packing');
    }
}