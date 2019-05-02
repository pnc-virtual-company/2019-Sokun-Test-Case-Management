<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestCase;
use App\Campaign;
class CampaignListTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testCase = TestCase::all();
        $campaign = Campaign::all();
        return view('pages.campaignListTest',compact('testCase','campaign'));
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
        return redirect('campaignListTest');
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
        $campaign->testCases;
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
        // $testCase = TestCase::findOrFail($id);
        // return view('pages.edit')->with('campaignListTest',$testCase);
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
        $testCase = TestCase::findOrFail($id);
        $testCase->update($request->all());
        return redirect('campaignListTest');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TestCase::find($id)->delete();
        // return back();

        $testcase = TestCase::findOrFail($id);
        $testcase->delete();
        return redirect('campaignListTest');
    }
}
