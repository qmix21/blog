<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserReport;
class ReportController extends Controller
{
    public function index()
    {
    	return UserReport::all();
    }
}
