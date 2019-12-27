<?php
/**
 * Copyright (c) 18.12.2019.
 * File - 2019_12_18_113959_add_foregin_to_role.php
 * Author - snigerev
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeginToRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
            $table->dropForeign('role_id'); // Drop foreign key 'user_id' from 'posts' table
        });
    }
}
