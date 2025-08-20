<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinishingLaporanController extends Controller
{
    public function index()
    {

        return view('dashboard.finishing.laporan');
    }
}
