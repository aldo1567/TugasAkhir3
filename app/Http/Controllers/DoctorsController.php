<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctors;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DoctorsController extends Controller
{
    //
    public function index(){
        $doctors = Doctors::all();
        return view('pages.admin.doctor.index',compact('doctors'));
    }
    public function store(Request $request){
        $validateData=$request->validate([
            'name'=>'required',
            'specialist'=>'required',
            'img'=>'required|file|image|max:1024'
        ]);
        $duplicate=Doctors::where('name',$validateData['name'])->first();
        if($duplicate){
            Alert::info('Duplicate','Data Already Exist');
            return redirect()->route('doctor.index'); 
        }
        $validateData['img']=$request->file('img')->store('assets/doctors','public');
        Doctors::create($validateData);
        Alert::success('Success','Data Successfully Added');
        return redirect()->route('doctor.index');
        
    }
    public function update(Request $request,Doctors $id){
        $validateData=$request->validate([
            'name'=>'required',
            'specialist'=>'required',
            'img'=>'file|image|max:1024'
        ]);
        $dataId = $id->find($id->id);
        $duplicate=Doctors::where('name',$validateData['name'])->where('id','!=',$id->id)->first();
        if($duplicate){
            Alert::info('Duplicate','Data Already Exist');
            return redirect()->route('doctor.index'); 
        }
        if($request->img){
            Storage::delete('public/'.$dataId->img);
            $validateData['img']=$request->file('img')->store('assets/doctors','public');
        }
        $dataId->update($validateData);
        Alert::warning('Update','Data Successfully Updated');
        return redirect()->route('doctor.index');
    }
    public function destroy(Doctors $id){
        $id->delete();
        Storage::delete('public/'.$id->img);
        Alert::error('Remove','Data Successfully Removed');
        return redirect()->route('doctor.index');
    }
}
