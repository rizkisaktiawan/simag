<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardSalesController extends Controller
{
    public function index(){
        return view('Dashboard.sales.index');
    }
}
