<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestCase;
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
        return view('pages.campaignListTest',compact('testCase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TestCase::create($request->all());
        // return redirect()->route('campaignListTest.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $testCase = TestCase::findOrFail($id);
        // return view('pages.show', compact('campaignListTest', $testCase));
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
        // TestCase::findOrFail($id)->update($request->all());
        // return redirect()->route('campaignListTest.index');
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
    }
}
