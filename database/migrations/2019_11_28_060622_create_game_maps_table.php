<?php
/**
 * Copyright (c) 28.11.2019.
 * File - 2019_11_28_060622_create_game_maps_table.php
 * Author - tor
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_maps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('x');
            $table->integer('y');
            $table->integer('sector')->unsigned()->index();
            $table->integer('type');
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
        Schema::dropIfExists('game_maps');
    }
}
