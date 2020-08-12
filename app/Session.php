<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    protected $guarded=[];
    
    public function workDay(){
        return $this->belongsTo('App\WorkDay','work_id','id');
    }

    public function booking(){
        return $this->hasMany('App\Booking','session_id','id');
    }
}
