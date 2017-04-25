<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    public $timestamps = false;

    public function routine(){
        return $this->belongsTo('App\Routine');
    }

    public function training_details(){
        return $this->hasMany('App\Training_detail');
    }
    
}
