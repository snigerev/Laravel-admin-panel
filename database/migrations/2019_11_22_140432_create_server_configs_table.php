<?php
/**
 * Copyright (c) 22.11.2019.
 * File - 2019_11_22_140432_create_server_configs_table.php
 * Author - tor
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ver')->default('0.1');
            $table->integer('user_count')->default('0');
            $table->boolean('is_active')->default(true);
            $table->integer('game_speed')->default('1');
            $table->integer('def_unobtaniy')->default('2500');;
            $table->integer('def_tiberium')->default('1500');;
            $table->integer('def_spaice')->default('1000');;
            $table->integer('def_nanoid')->default('100');;
            $table->integer('def_unobtaniy_storage')->default('5000');;
            $table->integer('def_tiberium_storage')->default('3000');;
            $table->integer('def_spaice_storage')->default('1000');;
            $table->integer('last_sector')->default('5000');
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
        Schema::dropIfExists('server_configs');
    }
}
