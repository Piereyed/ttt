<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencePeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_period', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('experience_id')->unsigned();
            $table->integer('period_id')->unsigned();
        });

        Schema::table('experience_period', function (Blueprint $table) {
             $table->foreign('experience_id')->references('id')->on('experiences');
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
        Schema::table('experience_period', function (Blueprint $table) {
            $table->dropForeign('experience_period_experience_id_foreign');
            $table->dropForeign('experience_period_period_id_foreign');
        });

        Schema::dropIfExists('experience_period');
    }
}
