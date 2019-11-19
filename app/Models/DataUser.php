<?php
/**
 * Copyright (c) 19.11.2019.
 * File - DataUser.php
 * Author - tor
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataUser extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
