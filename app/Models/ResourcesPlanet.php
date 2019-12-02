<?php
/**
 * Copyright (c) 2.12.2019.
 * File - ResourcesPlanet.php
 * Author - tor
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourcesPlanet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'planet_id', 'unobtaniy', 'tiberium', 'spaice', 'energy', 'energy_used', 'nanoid'
    ];

    public function Planet()
    {
        return $this->belongsTo('App\Models\UserPlanet');
    }
}
