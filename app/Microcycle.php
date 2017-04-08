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

    public function sessions(){
        $units = $this->units;
        $arr=[];
        foreach ($units as $unit) {
            if($unit->letter != '-'){
                array_push($arr, $unit);
            }
        }
        return $arr;
    }
    
}
