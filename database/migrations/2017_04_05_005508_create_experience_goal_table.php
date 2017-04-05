<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceGoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_goal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('experience_id')->unsigned();
            $table->integer('goal_id')->unsigned();
        });

         Schema::table('experience_goal', function (Blueprint $table) {
             $table->foreign('experience_id')->references('id')->on('experiences');
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
        Schema::table('experience_goal', function (Blueprint $table) {
            $table->dropForeign('experience_goal_experience_id_foreign');
            $table->dropForeign('experience_goal_goal_id_foreign');
        });

        Schema::dropIfExists('experience_goal');
    }
}
