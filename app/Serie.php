<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    
    public function training_session_series(){
        return $this->hasMany('App\Training_session_serie','serie_id');
    }
}
