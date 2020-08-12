<?php

namespace App\Http\Controllers;

use App\WorkDay;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WorkDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        //
        $work_day=WorkDay::all();
        return view('pages.admin.workday.index',compact('work_day'));
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
        $validateData=$request->validate([
            'date'=>'required'
        ]);
        $duplicate=WorkDay::where('date',$validateData['date'])->first();
        if($duplicate){
            Alert::info('Duplicate','Data Already Exist');
            return redirect()->route('workDay.index');
        }
        WorkDay::create($validateData);
        Alert::success('Success', 'Data Successfully Added');
        return redirect()->route('workDay.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkDay  $workDay
     * @return \Illuminate\Http\Response
     */
    public function show(WorkDay $workDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkDay  $workDay
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkDay $workDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkDay  $workDay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkDay $workDay)
    {
        //
        $validateData=$request->validate([
            'date'=>'required',
        ]);
        $duplicate=WorkDay::where('date',$validateData['date'])->first();
        if($duplicate){
            Alert::info('Duplicate','Data Already Exist');
            return redirect()->route('workDay.index');
        }
        $workDay->update($validateData);
        Alert::warning('Update', 'Data Successfully Updated');
        return redirect()->route('workDay.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkDay  $workDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkDay $workDay)
    {
        //
        $workDay->delete();
        Alert::error('Remove', 'Data Successfully Removed');
        return redirect()->route('workDay.index');
    }
}
