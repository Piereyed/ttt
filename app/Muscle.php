<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Muscle extends Model
{
    use SoftDeletes;

    public function exercises(){        
        return $this->belongsToMany('App\Exercise');
    }
}
