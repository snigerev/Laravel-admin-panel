<?php
/**
 * Copyright (c) 28.11.2019.
 * File - 2019_11_28_104753_add_last_planet_to_data_users.php
 * Author - tor
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLastPlanetToDataUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_users', function (Blueprint $table) {
            $table->bigInteger('last_planet')->after('role_id')->unsigned()->nullable();

            $table->foreign('last_planet')
                ->references('id')
                ->on('user_planets')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_users', function (Blueprint $table) {
            $table->dropColumn('last_planet');
            $table->dropForeign('last_planet');
        });
    }
}
