<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
//            @todo: change name to "group", e. g. (GK, D, M, A)
            $table->string('name')->unique();
//            @todo: add col name e. g. (CB, RB, RM, ST, CF)
//            @todo: or add "direction" e. g.: left, center, right
            $table->string('short', '3')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
