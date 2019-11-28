<?php
/**
 * Copyright (c) 28.11.2019.
 * File - 2019_11_28_070250_add_index_x_y_to_game_maps.php
 * Author - tor
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexXYToGameMaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_maps', function (Blueprint $table) {
            $table->index('x');
            $table->index('y');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_maps', function (Blueprint $table) {
            //
        });
    }
}
