<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quality;
use RealRashid\SweetAlert\Facades\Alert;

class QualityController extends Controller
{
    //
    public function index(){
        $qualities=Quality::all();
        return view('pages.admin.quality.index',compact('qualities'));
    }
    public function store(Request $request){
        $validateData=$request->validate([
            'title'=>'required',
            'icon'=>'required',
            'desc'=>'required'
        ]);
        $duplicate=Quality::where('title',$validateData['title'])->first();
        if($duplicate){
            Alert::info('Duplicate','Data Already Exist');
            return redirect()->route('quality.index');
        }
        Quality::create($validateData);
        Alert::success('Success','Data Successfully Added');
        return redirect()->route('quality.index');
    }
    public function update(Request $request,Quality $id){
        $validateData=$request->validate([
            'title'=>'required',
            'icon'=>'required',
            'desc'=>'required'
        ]);
        $duplicate=Quality::where('title',$validateData['title'])->where('id','!=',$id->id)->first();
        if($duplicate){
            Alert::info('Duplicate','Data Already Exist');
            return redirect()->route('quality.index');
        }
        $id->update($validateData);
        Alert::warning('Update','Data Successfully Updated');
        return redirect()->route('quality.index');
    }
    public function destroy(Quality $id){
        $id->delete();
        Alert::error('Remove','Data Successfully Removed');
        return redirect()->route('quality.index');
    }
}
