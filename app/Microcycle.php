<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Microcycle extends Model
{
    public $timestamps = false;

    public function goal(){
        return $this->belongsTo('App\Goal');
    }

    public function experience(){
        return $this->belongsTo('App\Experience');
    }

    public function units(){
        return $this->hasMany('App\UnitMicrocycle');
    }
    
}
