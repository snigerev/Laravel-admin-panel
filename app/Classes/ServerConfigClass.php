<?php
/**
 * Copyright (c) 3.12.2019.
 * File - ServerConfigClass.php
 * Author - tor
 */

namespace App\Classes;


use App\Models\ServerConfig;
use function Sodium\increment;

class ServerConfigClass
{


    public function updateLastSector()
    {
        $action = rand(0, 1);
        $count = rand(6, 15);

        switch ($action) {
            case 0:
                ServerConfig::increment('last_sector', $count);
                break;
            case 1:
                ServerConfig::decrement('last_sector', $count);
                break;
            default:
                break;
        }
        return true;
    }

    /**
     * Увеличиваем счетчик на $count
     * @param int $count
     * @return int
     */

    public function userCountUp(int $count)
    {
        return ServerConfig::increment('user_count', $count);
    }

}
