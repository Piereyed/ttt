<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    public function administradores(){
        return $this->belongsToMany('App\Person','person_role_local');
    }
}
