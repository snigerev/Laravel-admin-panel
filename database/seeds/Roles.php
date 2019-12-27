<?php
/**
 * Copyright (c) 18.12.2019.
 * File - Roles.php
 * Author - snigerev
 */

use App\Models\Role;
use Illuminate\Database\Seeder;

class Roles extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'Пользователь'],
            ['name' => 'Модератор'],
            ['name' => 'Администратор']
        ]);
    }
}
