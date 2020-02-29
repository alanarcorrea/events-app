<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventWallet extends Model
{
    protected $fillable = ['event_id', 'unit_value', 'amount'];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
