<?php
/**
 * Copyright (c) 18.12.2019.
 * File - 2019_11_19_061226_create_data_users_table.php
 * Author - snigerev
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->bigInteger('role_id')->unsigned()->default(1);
            $table->string('nickname', '50')->nullable();

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('CASCADE');

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
        Schema::dropIfExists('data_users');
    }
}
