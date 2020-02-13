<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    protected $primaryKey = 'user_id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
