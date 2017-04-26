<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training_session_serie extends Model
{
    public $timestamps = false;
    
    protected $table = 'training_session_serie';


    public function training_exercise(){
        return $this->belongsTo('App\Training_exercise','training_exercise_id');
    }
}
