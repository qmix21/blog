<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserReport;
class ReportController extends Controller
{
    public function index()
    {
    	$dates =UserReport::select('date')->distinct()->get();
    	var Chart = require('chart.js');
    	var myChart = new Chart();
    	return view('report',compact($dates,'dates'));
    }
}
