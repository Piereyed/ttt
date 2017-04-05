<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned();
            $table->integer('repetitions')->unsigned()->nullable();
            $table->float('weight', 8, 2)->nullable();
            $table->float('percentage_weight', 8, 2)->nullable();
            $table->integer('training_exercise_id')->unsigned();            
        });

        Schema::table('series', function (Blueprint $table) {
             $table->foreign('training_exercise_id')->references('id')->on('training_exercises');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('series', function (Blueprint $table) {
            $table->dropForeign('series_training_exercise_id_foreign');            
        });
        
        Schema::dropIfExists('series');
    }
}
