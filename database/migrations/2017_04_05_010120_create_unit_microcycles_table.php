<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitMicrocyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_microcycles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('letter',1);
            $table->integer('level')->unsigned()->nullable(); //0, 1, 2, 3
            $table->integer('type_session')->unsigned(); // 0->descanso, 1->musculacion, 2=>cardio
            $table->integer('microcycle_id')->unsigned();
            
        });

         Schema::table('unit_microcycles', function (Blueprint $table) {             
             $table->foreign('microcycle_id')->references('id')->on('microcycles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unit_microcycles', function (Blueprint $table) {
            $table->dropForeign('unit_microcycles_microcycle_id_foreign');
        });
        
        Schema::dropIfExists('unit_microcycles');
    }
}
