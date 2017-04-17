<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training_exercise extends Model
{
    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }

    public function series(){
        return $this->hasMany('App\Serie');
    }
}
