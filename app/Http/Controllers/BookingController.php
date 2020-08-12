<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\WorkDay;
use App\Session;
use Illuminate\Support\Facades\Auth;
use App\Status;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sessions=Session::all();

        return view('pages.user.index',compact('sessions'));
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
        $duplicate=Booking::where('user_id',Auth::user()->id)->where('session_id',$request->input('session'))->first();
        if($duplicate){
            Alert::info('Duplicate','This Appointment Already Exist');
            return redirect()->route('booking.show');
        }
        $status=Status::where('status','reserved')->first();    
        $getID=Session::findOrfail($request->input('session'));
        Booking::create([
            'user_id'=>Auth::user()->id,
            'session_id'=>$request->input('session'),
            'status_id'=>$status->id,
        ]);
        Session::where('id',$request->input('session'))->update(['capacity'=>$getID['capacity']-1]);
        Alert::success('Success','Appointment Successfully Added');
        return redirect()->route('booking.index');
        // Session::where('id',$validateData)->update(['capacity'=>]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $id=Booking::where('user_id',Auth::user()->id)->get();
        $sessions=Session::all();
        return view('pages.user.booking',compact('id','sessions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */

    public function cancel(Booking $id){
        $status=Status::where('status','cancel')->first();
        $id->update([
            'status_id'=>$status->id
        ]);
        return redirect()->route('booking.show'); 
    }
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
