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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('league_id');
            $table->unsignedInteger('team_id')->comment('Opponents team');
            $table->unsignedInteger('goals_in')->nullable();
            $table->unsignedInteger('goals_out')->nullable();
            $table->boolean('home')->default(1);
            $table->timestamp('start');

            $table->foreign('league_id')->references('id')->on('leagues');
            $table->foreign('team_id')->references('id')->on('teams');
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
