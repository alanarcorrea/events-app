<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public function event_wallet()
    {
        return $this->hasOne('App\EventWallet');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
