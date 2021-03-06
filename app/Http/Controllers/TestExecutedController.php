<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestStep;
use App\TestCase;
use App\Campaign;
class TestExecutedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $testExecution = TestCase::find($id);
        $cam_id = $testExecution->campaign_id;

        $campaign = Campaign::find($cam_id);
        return view('pages.executed',compact('testExecution','campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $testCase = TestCase::find($id);
        $cam_id = $testCase->campaign_id;

        $arr = collect([]);
        for($i=0; $i<count($request->id);$i++){
            TestStep::where('id', $request->id[$i])
            ->update(['executed_date' => $request->executed_date[$i],
            'status' => $request->status[$i],
            'actual_result' => $request->actual_result[$i]]);  
            $arr->push($request->status[$i]);
        }
        

        if(!$arr->contains(0) && !$arr->contains(2)){
            TestCase::where('id', $id)->update(['status'=> 1]);
        }
        elseif(!$arr->contains(1) && !$arr->contains(2)) {
            TestCase::where('id', $id)->update(['status'=> 0]); 
        }
        elseif($arr->contains(0)) {
            TestCase::where('id', $id)->update(['status'=> 3]);
        }
        elseif($arr->contains(2)) {
            TestCase::where('id', $id)->update(['status'=> 2]);
        }  


        $testCases = TestCase::where("campaign_id", $cam_id)->get();
        $arr2 = collect([]);
        foreach($testCases as $testCase) {
            
            $arr2->push($testCase->status);
        }

        if(!$arr2->contains(0) && !$arr2->contains(2) && !$arr2->contains(3)){
            Campaign::where('id', $cam_id)->update(['status'=> 1]);
        }
        elseif(!$arr2->contains(1) && !$arr2->contains(2) && !$arr2->contains(3)) {
            Campaign::where('id', $cam_id)->update(['status'=> 0]); 
        }
        elseif($arr2->contains(0) || $arr2->contains(3)) {
            Campaign::where('id', $cam_id)->update(['status'=> 3]);
        }
        elseif($arr2->contains(2)) {
            Campaign::where('id', $cam_id)->update(['status'=> 2]);
        }

        alert()->success('Update Success','Test Step has been update!');
        return redirect('testExecuted/'.$id);
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
