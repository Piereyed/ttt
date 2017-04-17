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
}
