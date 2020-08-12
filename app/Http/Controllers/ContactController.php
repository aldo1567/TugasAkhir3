<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    //
    public function index(){
        $contacs =Contact::all();
        return view('pages.admin.contact.index',compact('contacs'));
    }

    public function store(Request $request){
        $validateData=$request->validate([
            'message'=>'required',
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required'
        ]);
        Contact::create($validateData);
        Alert::success('Success',"You're Message Have Been Delivered");
        return redirect()->route('contact.index');
    }
}
