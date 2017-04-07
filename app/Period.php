<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
   public $timestamps = false;

   public function pyramids(){
        return $this->hasMany('App\Pyramid');
    }
    
}
