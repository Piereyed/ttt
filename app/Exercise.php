<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
    use SoftDeletes;

    public function muscles(){        
        return $this->belongsToMany('App\Muscle');
    }

    public function phase(){        
        return $this->belongsTo('App\Training_phase','training_phase_id');
    }

}
