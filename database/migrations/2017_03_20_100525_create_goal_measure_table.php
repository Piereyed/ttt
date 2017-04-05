<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalMeasureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_measure', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('period_id')->unsigned();
            $table->integer('goal_id')->unsigned();            
            $table->integer('success')->unsigned(); //0=> disminuir ,1=> aumentar
            $table->timestamps();
        });
         Schema::table('goal_measure', function (Blueprint $table) {
             $table->foreign('period_id')->references('id')->on('periods');             
             $table->foreign('goal_id')->references('id')->on('goals');             
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goal_measure', function (Blueprint $table) {
            $table->dropForeign('goal_measure_period_id_foreign');            
            $table->dropForeign('goal_measure_goal_id_foreign');            
        });

        Schema::dropIfExists('goal_measure');
    }
}
