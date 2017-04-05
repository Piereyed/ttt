<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicrocyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microcycles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goal_id')->unsigned();
            $table->integer('experience_id')->unsigned();

        });

         Schema::table('microcycles', function (Blueprint $table) {
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
        Schema::table('microcycles', function (Blueprint $table) {
            $table->dropForeign('microcycles_experience_id_foreign');
            $table->dropForeign('microcycles_goal_id_foreign');
        });
        
        Schema::dropIfExists('microcycles');
    }
}
