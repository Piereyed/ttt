<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonRoleLocalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_role_local', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->integer('local_id')->unsigned();
            $table->timestamps();
        });
        
        Schema::table('person_role_local', function (Blueprint $table) {
             $table->foreign('person_id')->references('id')->on('people');
             $table->foreign('role_id')->references('id')->on('roles');
             $table->foreign('local_id')->references('id')->on('locals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('person_role_local', function (Blueprint $table) {
            $table->dropForeign('person_role_local_person_id_foreign');
            $table->dropForeign('person_role_local_role_id_foreign');
            $table->dropForeign('person_role_local_local_id_foreign');
        });
        
        Schema::dropIfExists('person_role_local');
    }
}
