<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
{
    //
    public function index(){
        $about=About::all();
        return view('pages.admin.about.index',compact('about'));
    }
    public function store(Request $request){
        $validateData=$request->validate([
            'title'=>'required',
            'desc'=>'required',
            'img'=>'file|image|max:2048'
        ]);
        $validateData['img'] = $request->file('img')->store('assets/about','public');
        About::create($validateData);
        Alert::success('Success');
        return redirect()->route('about.index');
    }
    public function update(Request $request,About $id){
        $validateData=$request->validate([
            'title'=>'required',
            'desc'=>'required',
            'img'=>'file|image|max:2048'
        ]);
        if($request->img){
            Storage::delete('public/'.$id->img);
            $validateData['img'] = $request->file('img')->store('assets/about','public');
        }
        $id->update($validateData);
        Alert::warning('Success');
        return redirect()->route('about.index');
    }
}
