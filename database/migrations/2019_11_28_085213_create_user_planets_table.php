<?php
/**
 * Copyright (c) 28.11.2019.
 * File - 2019_11_28_085213_create_user_planets_table.php
 * Author - tor
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_planets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('planet_name')->default('planet');
            $table->bigInteger('game_map_id')->unsigned();
            $table->foreign('game_map_id')->references('id')->on('game_maps')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_planets');
    }
}
