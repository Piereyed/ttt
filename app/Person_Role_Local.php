<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person_Role_Local extends Model
{
	protected $table = 'person_role_local';

    public function person(){
        return $this->belongsTo('App\Person','person_id');
    }
}
