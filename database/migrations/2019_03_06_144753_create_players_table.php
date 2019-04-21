<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->unsignedInteger('country_id');
            $table->unsignedInteger('position_id');
            $table->unsignedInteger('transfer_id')->nullable();

            $table->unsignedInteger('number');
            $table->string('first_name');
            $table->string('last_name');

            $table->string('photo')->default('player.jpg');

            $table->integer('height')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();

            $table->unique(['first_name', 'last_name']);
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('transfer_id')->references('id')->on('transfers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
