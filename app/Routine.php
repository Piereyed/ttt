<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    public function trainings(){
        return $this->hasMany('App\Training');
    }

    public function training_sessions(){
        return $this->hasMany('App\Training_session');
    }
    
    public function athlete(){
        return $this->belongsTo('App\Person','person_id');
    }
    
    public function period(){
        return $this->belongsTo('App\Period');
    }
    
    public function exercises(){
        return $this->hasMany('App\Exercise');
    }
}
