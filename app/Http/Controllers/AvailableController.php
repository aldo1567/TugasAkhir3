<?php

namespace App\Http\Controllers;

use App\Available;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AvailableController extends Controller
{
    //
    public function index(){
        $availables=Available::all();
        return view('pages.admin.available.index',compact('availables'));
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'day'=>'required',
            'time'=>'required',
        ]);
        $duplicate=Available::where('day',$validateData['day'])->first();
        if($duplicate){
            Alert::info('Duplicate','Data Already Exist');
            return redirect()->route('available.index');
        }
        Available::create($validateData);
        Alert::success('Success','Data Successfully Added');
        return redirect()->route('available.index');
    }
    public function update(Request $request,Available $id){
        $validateData = $request->validate([
            'day'=>'required',
            'time'=>'required',
        ]);
        $duplicate=Available::where('day',$validateData['day'])->where('id','!=',$id->id)->first();
        if($duplicate){
            Alert::info('Duplicate','Data Already Exist');
            return redirect()->route('available.index');
        }
        $id->update($validateData);
        Alert::warning('Update','Data Successfully Updated');
        return redirect()->route('available.index');
    }
    public function destroy(Available $id){
        $id->delete();
        Alert::error('Reomve','Data Successfully Removed');
        return redirect()->route('available.index');
    }
}
