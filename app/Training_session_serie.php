<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training_session_serie extends Model
{
    public $timestamps = false;
    
    protected $table = 'training_session_serie';


//    public function training(){
//        return $this->belongsTo('App\Training');
//    }
}
