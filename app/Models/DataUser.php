<?php
/**
 * Copyright (c) 18.12.2019.
 * File - DataUser.php
 * Author - snigerev
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\DataUser
 *
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property string|null $nickname
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\DataUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\DataUser withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\DataUser withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $avatar
 * @property int $banned
 * @property string|null $banned_time
 * @property int $vacation_mode
 * @property string|null $vacation_time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser whereBanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser whereBannedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser whereVacationMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser whereVacationTime($value)
 * @property int|null $last_planet
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DataUser whereLastPlanet($value)
 * @property-read \App\Models\Role $role
 */
class DataUser extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'role_id', 'nickname'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
