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
            $table->increments('id');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('position_id');
            //changed ->default(0)
            $table->unsignedInteger('transfer_id')->default(0);

            $table->string('first_name');
            $table->string('last_name');
//            @todo: change string to integer
            $table->string('height')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('photo')->default('player.jpg');

            $table->unique(['first_name', 'last_name']);
            $table->foreign('country_id')->references('id')->on('country');

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
