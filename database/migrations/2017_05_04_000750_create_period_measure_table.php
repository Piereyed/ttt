<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodMeasureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('period_measure', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('period_id')->unsigned();
            $table->integer('measure_id')->unsigned();            
            $table->integer('success')->unsigned(); //0=> disminuir ,1=> aumentar
        });
        
        Schema::table('period_measure', function (Blueprint $table) {
             $table->foreign('period_id')->references('id')->on('periods');             
             $table->foreign('measure_id')->references('id')->on('measures');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('period_measure', function (Blueprint $table) {
            $table->dropForeign('period_measure_period_id_foreign');            
            $table->dropForeign('period_measure_measure_id_foreign');            
        });
        
        Schema::dropIfExists('period_measure');
    }
}
