<?php
/**
 * Copyright (c) 28.11.2019.
 * File - ServerConfig.php
 * Author - tor
 */

use Illuminate\Database\Seeder;

class ServerConfig extends Seeder
{
    protected $serverConfigRepository;

    public function __construct()
    {
        $this->serverConfigRepository = app(\App\Repositories\ServerConfigRepository::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (empty($this->serverConfigRepository->getServerConfig())) {
            \App\Models\ServerConfig::create();
        }
    }
}
