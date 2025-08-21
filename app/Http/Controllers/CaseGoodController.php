<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaseGoodController extends Controller
{

    public function adminDashboard()
    {
        return view('dashboard.admin.dashboard');
    }
}
