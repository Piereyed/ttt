<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine_exercise extends Model
{
    protected $table = 'routine_exercise';
    
    public function routine(){
        return $this->belongsTo('App\Routine');
    }
    
    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }
    
    
}
