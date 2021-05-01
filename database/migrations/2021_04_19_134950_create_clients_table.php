<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('nomclient');
            $table->string('prenomclient');

            $table->integer('ville_id')->unsigned();
            $table->foreign('ville_id')->references('id')->on('villes');

            $table->string('telephoneclient');
            $table->string('adresseclient');
            $table->string('emailclient');

            $table -> dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
