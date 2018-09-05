<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserReport;

class ReportController extends Controller
{
    public function index()
    {
        $dates = UserReport::select('date')->distinct()->get();
        $users = UserReport::select('name')->distinct()->get();
        return view('report', compact($dates, 'dates'),compact($names,'names'));
    }
}
