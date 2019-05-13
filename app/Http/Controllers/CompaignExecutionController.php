<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestStep;
use App\TestCase;
class CompaignExecutionController extends Controller
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
        //$testExecution->testSteps;
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
        
        $testCase = TestCase::find($id);
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
            TestCase::where('id', $id)->update(['status'=> 3]); 
        }
        elseif($arr->contains(0)) {
            TestCase::where('id', $id)->update(['status'=> 0]);
        }
        elseif($arr->contains(2)) {
            TestCase::where('id', $id)->update(['status'=> 2]);
        }  



        
        


    
        return redirect('testExecution/'.$id);
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
