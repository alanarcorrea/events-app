<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = ['title', 'description', 'date', 'hour', 'place', 'address', 'confirmation_deadline', 'minimum_people', 'status'];

    public function event_wallet()
    {
        return $this->hasOne('App\EventWallet');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
