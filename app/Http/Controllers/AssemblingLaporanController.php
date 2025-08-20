<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssemblingLaporanController extends Controller
{
    public function index()
    {

        return view('dashboard.assembling.laporan');
    }
}
