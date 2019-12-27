<?php
/**
 * Copyright (c) 18.12.2019.
 * File - DatabaseSeeder.php
 * Author - snigerev
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
        $this->call(Roles::class);
        // $this->call(UsersTableSeeder::class);
    }
}
