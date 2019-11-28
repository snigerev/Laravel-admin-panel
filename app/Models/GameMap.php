<?php
/**
 * Copyright (c) 28.11.2019.
 * File - GameMap.php
 * Author - tor
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GameMap
 *
 * @property int $id
 * @property int $x
 * @property int $y
 * @property int $sector
 * @property int $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GameMap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GameMap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GameMap query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GameMap whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GameMap whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GameMap whereSector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GameMap whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GameMap whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GameMap whereX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GameMap whereY($value)
 * @mixin \Eloquent
 */
class GameMap extends Model
{
    protected $fillable = [
        'type'
    ];

    public function UserPlanet()
    {
        return $this->belongsTo('App\Models\UserPlanet');
    }
}
