<?php

namespace App\Http\Controllers;

use App\Session;
use App\WorkDay;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index()
    {
        //
        $work=WorkDay::all();
        $session=Session::all();
        return view('pages.admin.session.index',compact('work','session'));
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
        $validateDate=$request->validate([
            'work_id'=>'required',
            'session_start'=>'required',
            'session_end'=>'required',
            'capacity'=>'required|numeric'
        ]);
        $duplicate=Session::where('work_id',$validateDate['work_id'])->where('session_start',$validateDate['session_start'])->where('session_end',$validateDate['session_end'])->first();
        if($duplicate){
            Alert::info('Duplicate','Data Already Exist');
            return redirect()->route('session.index');
        }
        Session::create($validateDate);
        Alert::success('Success','Data Successfully Added');
        return redirect()->route('session.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
        $validateDate=$request->validate([
            'work_id'=>'required',
            'session_start'=>'required',
            'session_end'=>'required',
            'capacity'=>'required|numeric'
        ]);
        $duplicate=Session::where('work_id',$validateDate['work_id'])->where('session_start',$validateDate['session_start'])->where('session_end',$validateDate['session_end'])->first();
        if($duplicate){
            Alert::info('Duplicate','Data Already Exist');
            return redirect()->route('session.index');
        }
        $session->update($validateDate);
        Alert::warning('Update','Data Successfully Updated');
        return redirect()->route('session.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
        $session->delete();
        Alert::error('Remove','Data Successfully Removed');
        return redirect()->route('session.index');
    }
}
