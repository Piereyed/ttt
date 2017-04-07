<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    public $timestamps = false;

    public function goals(){        
        return $this->belongsToMany('App\Goal');
    }

    public function periods(){        
        return $this->belongsToMany('App\Period');
    }
}
