<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserReport;

class ReportController extends Controller
{
    public function index()
    {
        $dates = UserReport::select('date')->distinct()->get();
        $distNames = UserReport::select('name')->distinct()->get();
        $names = [];
        foreach($distNames as $name)
        {
          if(preg_match('/\\d/', $name) > 0){

          }
          else {
            $names.push($name);
          }
        }
        return view('report', compact($dates, 'dates'),compact($names,'names'));
    }
}
