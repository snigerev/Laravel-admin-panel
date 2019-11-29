<?php
/**
 * Copyright (c) 29.11.2019.
 * File - UserPlanet.php
 * Author - tor
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserPlanet
 *
 * @property int $id
 * @property int $user_id
 * @property string $planet_name
 * @property int $game_map_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPlanet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPlanet newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserPlanet onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPlanet query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPlanet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPlanet whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPlanet whereGameMapId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPlanet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPlanet wherePlanetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPlanet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPlanet whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserPlanet withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserPlanet withoutTrashed()
 * @mixin \Eloquent
 */
class UserPlanet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'planet_name', 'game_map_id'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function GameMap()
    {
        return $this->hasOne('App\Models\GameMap');
    }
}
