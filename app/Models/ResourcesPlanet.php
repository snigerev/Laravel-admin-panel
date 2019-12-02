<?php
/**
 * Copyright (c) 2.12.2019.
 * File - ResourcesPlanet.php
 * Author - tor
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ResourcesPlanet
 *
 * @property int $id
 * @property int $planet_id
 * @property int $unobtaniy
 * @property int $tiberium
 * @property int $spaice
 * @property int $energy
 * @property int $energy_used
 * @property int $nanoid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\UserPlanet $Planet
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ResourcesPlanet onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet whereEnergy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet whereEnergyUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet whereNanoid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet wherePlanetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet whereSpaice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet whereTiberium($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet whereUnobtaniy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ResourcesPlanet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ResourcesPlanet withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ResourcesPlanet withoutTrashed()
 * @mixin \Eloquent
 */
class ResourcesPlanet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'planet_id', 'unobtaniy', 'tiberium', 'spaice', 'energy', 'energy_used', 'nanoid'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Planet()
    {
        return $this->belongsTo('App\Models\UserPlanet');
    }
}
