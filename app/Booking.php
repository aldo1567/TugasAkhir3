<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $guarded=[];

    public function session(){
        return $this->belongsTo('App\Session','session_id','id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function status(){
        return $this->belongsTo('App\Status','status_id','id');
    }
}
