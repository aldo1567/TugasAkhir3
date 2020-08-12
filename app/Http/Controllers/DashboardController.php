<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Session;
use App\Status;
use App\WorkDay;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    
    public function index(){
        $bookings=Booking::all()->count();
        $sessions=Session::all()->count();
        $statuses=Status::all()->count();
        $workDays=WorkDay::all()->count();

        return view('pages.admin.index',compact('bookings','sessions','statuses','workDays'));
    }
}
