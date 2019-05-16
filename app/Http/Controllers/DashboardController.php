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
        $dataPie = [90, 90, 1000];
        $arr['pie'] = $dataPie;
        return response()->json($arr);
    }
    
    public function index()
    {
        $campaign = Campaign::all();
        $arr=[];
        foreach($campaign as $com){
            $arr[$com->name] = TestCase::where('campaign_id', $com->id)->count('id');
        }
        foreach($arr as $key => $value){
            $barTitle[] = $key;
            $barData[] = $value;
        }
        return view('pages.dashboard',compact(['campaign', 'barTitle', 'barData']));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
