<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevisiAssemblingLaporanController extends Controller
{
    public function index()
    {

        return view('dashboard.devisiassembling.laporan');
    }
}
