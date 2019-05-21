<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestCase;
use App\Campaign;
class CampaignListTestController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $testCase = TestCase::all();
        // return view('pages.campaignListTest',compact('testCase','campaign'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.campaignListTest');
       
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testCase = TestCase::create($request->all());
        $cam_id = $request->campaign_id;

        $testCases = TestCase::where("campaign_id", $cam_id)->get();
        $arr = collect([]);
        foreach($testCases as $testCase) {
            
            $arr->push($testCase->status);
        }
        
        
        if(!$arr->contains(0) && !$arr->contains(2) && !$arr->contains(3)){
            Campaign::where('id', $cam_id)->update(['status'=> 1]);
        }
        elseif(!$arr->contains(1) && !$arr->contains(2) && !$arr->contains(3)) {
            Campaign::where('id', $cam_id)->update(['status'=> 0]); 
        }
        elseif($arr->contains(0) || $arr->contains(3)) {
            Campaign::where('id', $cam_id)->update(['status'=> 3]);
        }
        elseif($arr->contains(2)) {
            Campaign::where('id', $cam_id)->update(['status'=> 2]);
        }



        alert()->success('Create Success','Test Case has been created!');
        return redirect('campaignListTest/'.$request->campaign_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campaign = Campaign::find($id);
        return view('pages.campaignListTest',compact('campaign'));
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
     * Update th$e specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
        * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $testCase = TestCase::findOrFail($id);
        $testCase->update($request->all());
        alert()->success('Update Success','Test Case has been updated!');
        return redirect('campaignListTest/'.$request->campaign_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function  destroy(Request $request, $id)
    {
        $testcase = TestCase::findOrFail($id);
        $cam_id = $testcase->campaign_id;
        $testcase->delete();


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


        alert()->success('Delete Success','Test Case has been deleted!');
        return redirect('campaignListTest/'.$request->campaign_id);
    }
}
