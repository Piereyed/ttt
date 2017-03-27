<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;
    
    public function roles(){
        return $this->belongsToMany('App\Role','person_role_local');
    }
    
    public function locals(){
        return $this->belongsToMany('App\Local','person_role_local');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function trainer(){
        return $this->belongsTo('App\Person','trainer_id');
    }

    public function experience(){
        return $this->belongsTo('App\Experience');
    }
    
    
}
