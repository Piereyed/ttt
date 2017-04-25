<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training_detail extends Model
{
    public function training_exercises(){
        return $this->hasMany('App\Training_exercise');
    }
    
    public function training(){
        return $this->belongsTo('App\Training');
    }
}
