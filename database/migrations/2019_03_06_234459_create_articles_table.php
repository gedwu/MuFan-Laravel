<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('title');
            $table->text('body');
            $table->string('photo')->default('article.jpg');

            $table->string('video')->nullable();
            $table->unsignedInteger('game_id')->nullable();
            $table->unsignedInteger('league_id')->nullable();
            $table->unsignedInteger('player_id')->nullable();
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games');
//            @todo How to avoid duplicate when we have game_id?
            $table->foreign('league_id')->references('id')->on('leagues');
            $table->foreign('player_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
