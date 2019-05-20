<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use App\TestCase;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function testCase(Request $request)
    {
<<<<<<< HEAD
        $testCases = TestCase::where('compaign_id', $request->id)->select('*')->get();
        $pass = 0;
        $fail = 0;
        $not_run = 0;
        foreach ($testCases as $value){
            if ($value->status==0){
                $not_run = $not_run+1;
            }
            if ($value->status==1){
                $pass = $pass+1;
            }
            if ($value->status==2){
                $fail = $fail+1;
            }
        }
        $dataPie = [$pass, $fail, $not_run];
=======
        // $testCases = TestCase::where('compaign_id', $request->id)->select('*')->get();
        // $pass = 0;
        // $fail = 0;
        // $not_run = 0;
        // foreach ($testCases as $value){
        //     if ($value->status==0){
        //         $not_run = $not_run+1;
        //     }
        //     if ($value->status==1){
        //         $pass = $pass+1;
        //     }
        //     if ($value->status==2){
        //         $fail = $fail+1;
        //     }
        // }
        $dataPie = [90, 90, 100];
>>>>>>> c1d3966eead60860f1a805b7a4c0a2ec0c1ad8b9
        $arr['pie'] = $dataPie;
        return response()->json($arr);

    }
    
    public function index()
    {
        $campaign = Campaign::all();
        // dd($campaign);
        $arr=[];
        foreach($campaign as $com){
            // dd($com);
            $arr[$com->name] = TestCase::where('campaign_id', $com->id)->count('id');
            // dd($arr);
        }
        foreach($arr as $key => $value){
            $barTitle[] = $key;
            // dd($key);
            $barData[] = $value;
            // dd($value);
        }
        return view('pages.dashboard',compact(['campaign', 'barTitle', 'barData']));  
    }
  
}
