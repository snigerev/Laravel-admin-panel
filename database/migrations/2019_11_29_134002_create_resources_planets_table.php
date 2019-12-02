<?php
/**
 * Copyright (c) 2.12.2019.
 * File - 2019_11_29_134002_create_resources_planets_table.php
 * Author - tor
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesPlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources_planets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('planet_id')->unsigned()->index();
            $table->bigInteger('unobtaniy');
            $table->bigInteger('tiberium');
            $table->bigInteger('spaice');
            $table->bigInteger('energy')->default(0);
            $table->bigInteger('energy_used')->default(0);
            $table->bigInteger('nanoid');
            $table->foreign('planet_id')->references('id')->on('user_planets')->onDelete('cascade');
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
        Schema::dropIfExists('resources_planets');
    }
}
