<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned();
            $table->boolean('done');
            $table->integer('work_objetive')->unsigned();
            $table->integer('work_done')->unsigned();
            $table->float('efficiency',8,2)->unsigned();
            $table->integer('duration')->unsigned()->nullable();

            $table->integer('training_id')->unsigned();
            $table->integer('routine_id')->unsigned();           
            
            $table->timestamps();
        });

        Schema::table('training_sessions', function (Blueprint $table) {
             $table->foreign('training_id')->references('id')->on('trainings');             
             $table->foreign('routine_id')->references('id')->on('routines');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_sessions', function (Blueprint $table) {
            $table->dropForeign('training_sessions_training_id_foreign');            
            $table->dropForeign('training_sessions_routine_id_foreign');            
        });

        Schema::dropIfExists('training_sessions');
    }
}
