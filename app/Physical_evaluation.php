<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Physical_evaluation extends Model
{
    public function measures(){
        return $this->belongsToMany('App\Measure','physical_evaluation_measure')->withPivot('value');;
    }
}
