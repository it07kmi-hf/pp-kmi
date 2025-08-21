<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaseGoodAssemblingController extends Controller
{

    public function caseGoodD1()
    {
        return view('dashboard.devisiassembling.casegoodd1');
    }
    public function caseGoodD2()
    {
        return view('dashboard.devisiassembling.casegoodd2');
    }
    public function caseGoodD3()
    {
        return view('dashboard.devisiassembling.casegoodd3');
    }
    public function caseGoodD4()
    {
        return view('dashboard.devisiassembling.casegoodd4');
    }
    public function chair()
    {
        return view('dashboard.devisiassembling.chair');
    }
    public function metal()
    {
        return view('dashboard.devisiassembling.metal');
    }
    public function playfield()
    {
        return view('dashboard.devisiassembling.playfield');
    }
}
