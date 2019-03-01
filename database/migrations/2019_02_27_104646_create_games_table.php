<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('league_id');
            $table->unsignedInteger('team_id')->comment('Opponents team');

//            @todo: change default to NULL ?
            $table->unsignedInteger('goals_in')->default(0);
            $table->unsignedInteger('goals_out')->default(0);
            $table->boolean('home')->default(1);
            $table->timestamp('start');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
