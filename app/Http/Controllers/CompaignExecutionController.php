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
        $testExecution = TestCase::find($id);
        
         

         
        for($i=0; $i<count($request->id);$i++){
            TestStep::where('id', $request->id[$i])
                ->update(['executed_date' => $request->executed_date[$i],
                    'status' => $request->status[$i],
                    'actual_result' => $request->actual_result[$i]]);
                $run = 0;
                $passed = 0;
                $failed = 0;

                // @if($request->status[$i] == 0)
                //     $run += $run;
                // @elseif ($request->status[$i] == 1)
                //     $passed += $passed;
                // @elseif ($request->status[$i] == 2)
                //     $failed += $failed;
                // @endif
                
        }
        dd($failed);


    
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
