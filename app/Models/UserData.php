<?php
/**
 * Copyright (c) 18.11.2019.
 * File - UserData.php
 * Author - tor
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserDate
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserData newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserData onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserData query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserData whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserData whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserData whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserData whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserData withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserData withoutTrashed()
 * @mixin \Eloquent
 */
class UserData extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
