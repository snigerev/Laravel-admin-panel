<?php
/**
 * Copyright (c) 2.12.2019.
 * File - ServerConfig.php
 * Author - tor
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ServerConfig
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $ver
 * @property int $user_count
 * @property int $is_active
 * @property int $game_speed
 * @property int $def_unobtaniy
 * @property int $def_tiberium
 * @property int $def_spaice
 * @property int $def_nanoid
 * @property int $def_unobtaniy_storage
 * @property int $def_tiberium_storage
 * @property int $def_spaice_storage
 * @property int $last_sector
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereDefNanoid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereDefSpaice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereDefSpaiceStorage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereDefTiberium($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereDefTiberiumStorage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereDefUnobtaniy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereDefUnobtaniyStorage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereGameSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereLastSector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereUserCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServerConfig whereVer($value)
 */
class ServerConfig extends Model
{
    //
}
