<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('letter',1)->nullable();
            $table->integer('resting_time')->unsigned();
            $table->integer('routine_id')->unsigned();
            $table->integer('strength_type_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('trainings', function (Blueprint $table) {
             $table->foreign('routine_id')->references('id')->on('routines');             
             $table->foreign('strength_type_id')->references('id')->on('strength_types');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropForeign('trainings_routine_id_foreign');            
            $table->dropForeign('trainings_strength_type_id_foreign');            
        });

        
        Schema::dropIfExists('trainings');
    }
}
