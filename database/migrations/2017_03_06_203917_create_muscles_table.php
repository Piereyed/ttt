<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muscles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);            
            $table->integer('body_part')->unsigned()->nullable(); // 0=> up , 1 => down
            $table->integer('priority')->unsigned()->nullable(); // 1=> maxima , 5 => minima
            $table->integer('measure_id')->unsigned()->nullable(); 
        });

    }

   
    public function down()
    {
        Schema::dropIfExists('muscles');
    }
}
