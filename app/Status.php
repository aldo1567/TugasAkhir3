<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $guarded=[];

    public function booking(){
        return $this->hasMany('App\Booking','status_id','id');
    }
}
