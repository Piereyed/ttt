<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePyramidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pyramids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('percentage_rm')->unsigned();
            $table->integer('period_id')->unsigned();
            
        });

        Schema::table('pyramids', function (Blueprint $table) {
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
        Schema::table('pyramids', function (Blueprint $table) {
            $table->dropForeign('pyramids_period_id_foreign');
        });
        
        Schema::dropIfExists('pyramids');
    }
}
