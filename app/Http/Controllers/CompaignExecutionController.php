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
        $testStep = $testExecution->testSteps;
        // $test = request()->except(['_token']);


        //$testStep->where('id',$test->id)->update($test->all());
        //dd($request);
         

        for($i=0; $i<count($request->id);$i++){
            TestStep::where('id', $request->id[$i])
          ->update(['executed_date' => $request->executed_date[$i],
                    'status' => $request->status[$i],
                    'actual_result' => $request->actual_result[$i]]);
        }
       
        //->update($test->all());

        // $data = $request->all();
        // $lastid = TestCase::update($data)->id;
        // if(count($request->executed_date) > 0)
        // {
        //     foreach($request->executed_date as $value)
        //     {
        //         $data2 = array(
        //             'id'=>$lastid,
        //             'executed_date'=>$request->executed_date[$data],
        //             'status'=>$request->status[$data],
        //             'actual_result'=>$request->actual_result[$data]
        //         );
        //         TestCase::update($data2);
        //     }
        // }


        // $collection = collect(['id' => $request->id, 
        //                         'execute_date' => $request->executed_date,
        //                         'status' => $request->status,
        //                         'actual_result' => $request->actual_result  
        // ]);
        // $collection->toArray();

        
        //dd(json_encode($testS));
        //TestStep::update($testS);
        //dd($collection);
        
        // dd($request->executed_date);

        
        // dd($value->execute_date);
        // $value->id = $request->id;
        // $value->execute_date = $request->execute_date;
        // $value->status = $request->status;
        // $value->save();
        // $value->actual_result = $collection->actual_result;
        //dd($value);
        //$testStep->fill($value)->save();
        //$value->update($request->all());
        //$value = request()->except(['_token']);
        //$value::where('id', $request->id)->update($test->all());
        // dd($value);
        // $value->id = $id;
        // $value->status = $status;
        // dd($value->executed_date);

        //$value->update($testS);

        //}
         
        

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
