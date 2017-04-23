<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training_session extends Model
{
    public function training(){
        return $this->belongsTo('App\Training');
    }
    
    public function routine(){
        return $this->belongsTo('App\Routine');
    }
}
