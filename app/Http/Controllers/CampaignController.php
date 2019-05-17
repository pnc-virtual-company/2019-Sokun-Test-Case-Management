<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;

class CampaignController extends Controller
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
        $campaign = Campaign::all();
        return view('pages.campaign',compact('campaign'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        $messages = ['name.required'=>'This recodes already taken'];
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description'=>'required'
        ]);
      
       $messages = ['name.required'=>'This recodes already taken'];
       $this->validate($request,[
           'name' => 'required|unique:campaigns||min:1',
       ],$messages);

       $campaign = new Campaign;
       $campaign->name = $request->name;
       $campaign->start_date = $request->start_date;
       $campaign->end_date = $request->end_date;
       $campaign->description = $request->description;

       $campaign->save();
     
       return redirect('campaign');
        $campaign = Campaign::create($request->all());
        alert()->success('Create Success','Campaign has been created!');
        return redirect('campaign');
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
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description'=>'required'
        ]);
        $campaign = Campaign::Find($id);
        $campaign->update($request->all());
        alert()->success('Update Success','Campaign has been updated!');
        return redirect('campaign');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campaign = Campaign::FindOrFail($id);
        $campaign->delete();
        alert()->success('Delete Success','Campaign has been deleted!');
        return redirect('campaign');
    }
}
