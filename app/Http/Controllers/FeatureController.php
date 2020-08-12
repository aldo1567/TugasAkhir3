<?php

namespace App\Http\Controllers;

use App\Feature;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Repositories\Repo;

class FeatureController extends Controller
{
    //
    protected $repo;
    public function __construct()
    {
        $this->repo = new Repo();
    }

    public function index(){
        $features=Feature::all();
        return view('pages.admin.feature.index',compact('features'));
    }

    public function store(Request $request,$id=NULL){
        // $validateData=$request->validate([
        //     'feature'=>'required'
        // ]);
        // $duplicate = Feature::where('feature',$validateData['feature'])->first();
        // if($duplicate){
        //     Alert::info('Duplicate','Data Already Exist');
        //     return redirect()->route('feature.index');
        // }
        // Feature::create($validateData);
        
        $this->repo->storeFeature($request,$id);
        Alert::success('Success','Data Successfully Added');
        return redirect()->route('feature.index');
    }

    public function update(Request $request,Feature $id){
        // $validateData=$request->validate([
        //     'feature'=>'required'
        // ]);
        // $duplicate = Feature::where('feature',$validateData['feature'])->where('id','!=',$id->id)->first();
        // if($duplicate){
        //     Alert::info('Duplicate','Data Already Exist');
        //     return redirect()->route('feature.index');
        // }
        // $id->update($validateData);
        $this->repo->storeFeature($request,$id->id);
        Alert::warning('Update','Data Successfully Updated');
        return redirect()->route('feature.index');
    }

    public function destroy(Feature $id){
        $id->delete();
        Alert::error('Remove','Data Successfully Removed');
        return redirect()->route('feature.index');
    }
}
