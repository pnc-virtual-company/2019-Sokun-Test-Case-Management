<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestStep;
use App\TestCase;
class testStepController extends Controller
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
        $testStep = TestStep::all();
       return view('pages.testStep',compact('testStep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.testStep');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'action' => 'required',
            'expected_result' => 'required',
        ]); 
        $testStep = TestStep::create($request->all());
        return redirect('testStep/'.$request->test_case_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testCase = TestCase::find($id);
        //$testCase->testSteps;
        return view('pages.testStep',compact('testCase'));
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
        $request->validate([
            'name' => 'required',
            'action' => 'required',
            'expected_result' => 'required',
        ]); 
        $TestStep = TestStep::findOrFail($id);
        $TestStep->update($request->all());
        return redirect('testStep/'.$request->test_case_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $TestStep = TestStep::findOrFail($id);
        $TestStep->delete();
        return redirect('testStep/'.$request->test_case_id);
    }
}
