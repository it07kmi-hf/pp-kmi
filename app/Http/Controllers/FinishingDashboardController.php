<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinishingDashboardController extends Controller
{
    public function finishingDashboard()
    {
        return view('dashboard.finishing.dashboard');
    }
}