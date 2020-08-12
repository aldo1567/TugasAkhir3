<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    //
    public function index(){
        $company=Company::all();
        return view('pages.admin.company.index',compact('company'));
    }

    public function update(Request $request,Company $id){
        $validateData = $request->validate([
            'name'=>'required',
            'motto'=>'required',
            'logo'=>'file|image|max:1024',
            'address'=>'required',
            'map_address'=>'required',
            'feature_title'=>'required',
            'feature_desc'=>'required',
            'doctor_title'=>'required',
            'doctor_desc'=>'required',
            'quality_title'=>'required',
            'quality_desc'=>'required',
            'email'=>'required',
            'phone'=>'required|numeric',
        ]);
        $getId=$id->find($id->id);
        if($request->logo){
            Storage::delete('public/'.$getId->logo);
            $validateData['logo']=$request->file('logo')->store('assets/company','public');
        }
        $id->update($validateData);
        Alert::warning('Update','Data Successfully Updated');
        return redirect()->route('company.index');
    }
    public function about(){
        return view('pages.user.about');
    }
}
