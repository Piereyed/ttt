<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('description',1000);
            $table->string('photo',100)->nullable();
            $table->integer('type')->unsigned()->nullable();//0=> aerobico,1=>anaerobico
            $table->integer('training_phase_id')->unsigned();
            $table->integer('experience_id')->unsigned();            
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('exercises', function (Blueprint $table) {
             $table->foreign('training_phase_id')->references('id')->on('training_phases');             
             $table->foreign('experience_id')->references('id')->on('experiences');       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->dropForeign('exercises_training_phase_id_foreign');            
            $table->dropForeign('exercises_experience_id_foreign');            
        });

        Schema::dropIfExists('exercises');
    }
}
