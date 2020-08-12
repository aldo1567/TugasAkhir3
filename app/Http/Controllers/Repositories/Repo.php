<?php
namespace App\Http\Controllers\Repositories;

use App\Feature;
use Illuminate\Support\Facades\Validator;

class Repo{
    public function findFeatureId($id){
        return Feature::findOrFail($id);
    }

    public function storeFeature($request,$id){
        $result = ['status' => false, 'message' => ''];
        $validator = Validator::make($request->all(), 
            [
                'feature' => 'required',
            ]
        );
        if($validator->fails()){
            $result['message'] = $validator->errors()->all();
            return $result;
        }
        $feature= new Feature();
        if($id){
            $feature =  $this->findFeatureId($id);
        }
        $feature->feature = $request->feature;
        $feature->save();
        $result['status']=true;
        $result['message']=$feature;
        return $result;
    }
}



?>