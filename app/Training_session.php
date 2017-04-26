<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training_session extends Model
{
    public function training(){
        return $this->belongsTo('App\Training');
    }
    
    public function routine(){
        return $this->belongsTo('App\Routine');
    }
    
    public function training_session_series(){
        return $this->hasMany('App\Training_session_serie','training_session_id');
    }
    
}
