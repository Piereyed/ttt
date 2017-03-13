<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Local extends Model
{
    use SoftDeletes;

    public function people(){        
        return $this->belongsToMany('App\Person','person_role_local');
    }
}
