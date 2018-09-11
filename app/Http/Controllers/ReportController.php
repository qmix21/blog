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
        $users = UserReport::all();
        $names = [];
        foreach($distNames as $name)
        {
          if(preg_match('/\\d/', $name) > 0){

          }
          else {
            array_push($names,$name);
          }
        }
        #return $names;
       return view('report',compact($users,'users'), compact($dates, 'dates'))->with('names',$names);
    }
}
