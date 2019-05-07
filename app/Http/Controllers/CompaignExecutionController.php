<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestStep;
use App\TestCase;
class CompaignExecutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $testStep = TestStep::find($id);
        dd($testStep);
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
        $testExecution->testSteps;
        return view('pages.testExecution',compact('testExecution'));
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
        $testExecution = TestCase::find($id);
        $testStep = $testExecution->testSteps;
        $collection = collect(['id' => $request->id, 
                                'execute_date' => $request->executed_date,
                                'status' => $request->status,
                                'actual_result' => $request->actual_result  
        ]);
        $collection->toArray();
        dd($testStep);
        
        // dd($request->executed_date);
        //foreach($testStep as $value){
        //     //dd($value->execute_date);
        //  $value->id = $collection->id;
        // $value->execute_date = $collection->execute_date;
        // $value->status = $collection->status;
        // $value->actual_result = $collection->actual_result;
        //     //dd($value);
        //     //$testStep->fill($value)->save();
        //     //$value->update($request->all());
        //     //$value = request()->except(['_token']);
        //     //$value->where('id', $value->id)->update($request->all());
        //     // dd($value);
        //     // $value->id = $id;
        //     // $value->status = $status;
        //     // dd($value->executed_date);




        //}
         TestStep::where('id', $request->id)
          ->update(['executed_date' => $request->executed_date]);
          


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
