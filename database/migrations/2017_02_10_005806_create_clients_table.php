<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sex',1);
            $table->integer('type_doc');
            $table->string('num_doc',20);
            $table->string('name',100);
            $table->string('lastname1',100);
            $table->string('lastname2',100);
            $table->string('address',500);
            $table->string('email',100);
            $table->date('birthday');
            $table->string('phone',15);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
