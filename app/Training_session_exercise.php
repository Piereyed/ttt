<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training_session_exercise extends Model
{
    public $timestamps = false;

    protected $table = 'training_session_exercise';
    
    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }
    
    public function training_session(){
        return $this->belongsTo('App\Training_session');
    }

}
