<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PriceReportController extends Controller
{
    public function index() {
        return view('reports.price_report');
    }
}
