<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Session;
use App\Status;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBookingController extends Controller
{
    //
    
    public function index(){
        $sessions=Session::all();
        $bookings=Booking::all();
        return view('pages.admin.booking.index',compact('bookings','sessions'));
    }
    
    public function complete(Booking $id){
        $status=Status::where('status','complete')->first();
        $id->update([
            'status_id'=>$status->id
        ]);
        Alert::success('Success', 'Success Status Has Changed To Complete');
        return redirect()->route('admin.booking'); 
    }
    public function cancel(Booking $id){
        $status=Status::where('status','cancel')->first();
        $id->update([
            'status_id'=>$status->id
        ]);
        Alert::success('Success', 'Success Status Has Changed To Cancel');
        return redirect()->route('admin.booking'); 
    }

    public function update(Request $request,Booking $id){
        $id->update([
            'session_id'=>$request->input('session'),
        ]);
        // dd($id);
        Alert::warning('Updated', 'Data Successfully Updated');
        return redirect()->route('admin.booking'); 
    }

}
