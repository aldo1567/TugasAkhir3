<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class WorkDay extends Model
{
    //
    protected $guarded=[];
    public function session(){
        return $this->hasMany('App\Session','work_id','id');
    }
}
