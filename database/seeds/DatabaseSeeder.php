<?php
/**
 * Copyright (c) 28.11.2019.
 * File - DatabaseSeeder.php
 * Author - tor
 */

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ServerConfig::class);
        $this->call(AddMap::class);
        // $this->call(UsersTableSeeder::class);
    }
}
