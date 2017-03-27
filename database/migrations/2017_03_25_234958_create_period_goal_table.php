<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodGoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('period_goal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goal_id')->unsigned();
            $table->integer('period_id')->unsigned();
        });
        Schema::table('period_goal', function (Blueprint $table) {
             $table->foreign('goal_id')->references('id')->on('goals');
             $table->foreign('period_id')->references('id')->on('periods');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('period_goal', function (Blueprint $table) {
            $table->dropForeign('period_goal_goal_id_foreign');
            $table->dropForeign('period_goal_period_id_foreign');
        });

        Schema::dropIfExists('period_goal');
    }
}
