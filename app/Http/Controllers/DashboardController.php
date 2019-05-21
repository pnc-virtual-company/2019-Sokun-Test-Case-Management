<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use App\TestCase;
use DB;
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
        // alert($request->id);
        $testC = TestCase::where('campaign_id', $request->id)->get();

        $not_run = 0;
        $passed = 0;
        $failed = 0;

        $arr3 = collect([]);
        //$arr3 = new Collection();
        // $arr3->push(1);
        foreach($testC as $testCase) {
            
            $arr3->push($testCase->status);
        }

        foreach ($arr3 as $value){
            if ($value == 0){
                $not_run++;
            }
            if ($value == 1){
                $passed++;
            }
            if ($value == 2){
                $failed++;
            }
        }

        $dataPie = [$passed, $failed, $not_run];
        $arr['pie'] = $dataPie;
        return response()->json($arr);

    }
    
    public function index()
    {
        $campaign = Campaign::all();
        $barData=collect([]);

        foreach($campaign as $cam){
            $barData->push($cam->testCases()->where('status',1)->count());
        }
        


        $barTitle = $campaign->pluck('name');
        // $barData = Campaign::select('id')->groupBy('name')->get()->count();

        // $getData = DB::table('campaigns')
        //          ->select('id', DB::raw('count(*) as total'))
        //          ->groupBy('name')
        //          ->get();

       
        
        return view('pages.dashboard',compact(['campaign', 'barTitle', 'barData']));  
    }
  
}
