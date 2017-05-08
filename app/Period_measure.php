<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period_measure extends Model
{
    public $timestamps = false;
    protected $table = 'period_measure';

    public function period(){
        return $this->belongsTo('App\period');
    }

    public function measure(){
        return $this->belongsTo('App\Measure');
    }

}
