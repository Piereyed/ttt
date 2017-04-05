<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muscle extends Model
{
    public $timestamps = false;

    public function exercises(){        
        return $this->belongsToMany('App\Exercise');
    }
}
