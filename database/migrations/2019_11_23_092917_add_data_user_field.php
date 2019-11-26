<?php
/**
 * Copyright (c) 23.11.2019.
 * File - 2019_11_23_092917_add_data_user_field.php
 * Author - tor
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataUserField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_users', function (Blueprint $table) {
            $table->string('avatar')->nullable()->after('nickname');
            $table->integer('banned')->default(0)->after('avatar');
            $table->dateTime('banned_time')->nullable()->after('banned');
            $table->integer('vacation_mode')->default(0)->after('banned_time');
            $table->dateTime('vacation_time')->nullable()->after('vacation_mode');

//            DB::table('data_users')->update([
//                'avatar' => null,
//                'banned' => 0,
//                'banned_time' => null,
//                'vacation_mode' => 0,
//                'vacation_time' => null
//            ]);
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
            $table->dropColumn('avatar');
            $table->dropColumn('banned');
            $table->dropColumn('banned_time');
            $table->dropColumn('vacation_mode');
            $table->dropColumn('vacation_time');
        });
    }
}
