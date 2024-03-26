<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('merchant.dashboard.dashboard');
    }
    public function vat_calculation()
    {
        return view('merchant.vat.vat');
    }


}
