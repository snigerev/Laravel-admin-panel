<?php
/**
 * Copyright (c) 29.11.2019.
 * File - AddMap.php
 * Author - tor
 */

use App\Repositories\GameMapRepository;
use Illuminate\Database\Seeder;

class AddMap extends Seeder
{
    /**
     * @var
     */
    protected $gameMapRepository;

    /**
     * AddMap constructor.
     */
    public function __construct()
    {
        $this->gameMapRepository = app(GameMapRepository::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!$this->gameMapRepository->isExist()) {
            for ($des = 1; $des <= 100; $des++) {
                unset($coord);
                for ($y = ($des * 10 - 9); $y <= ($des * 10); $y++) {
                    $count_for_x = 10;
                    $sector = ($des * 100 - 99);
                    for ($x = 1; $x <= 1000; $x++) {
                        if ($x == $count_for_x + 1) {
                            $sector += 1;
                            $count_for_x += 10;
                        }
                        $coord[] = [
                            'x' => $x,
                            'y' => $y,
                            'sector' => $sector,
                            'type' => 0
                        ];
                    }
                }

                DB::table('game_maps')->insert($coord);
            }
        }
    }
}
