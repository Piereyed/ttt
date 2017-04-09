<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise_Muscle extends Model
{
    protected $table = 'exercise_muscle';
    public $timestamps = false;

    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }
}
