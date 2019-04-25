<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    //
    function view() {
        return view('pages.dashboard',['currentExample' => 'Charts in JS']);
        // return view('examples.chartjs', ['currentExample' => 'Charts in JS']);
    }
}
