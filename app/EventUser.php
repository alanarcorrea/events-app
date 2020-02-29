<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $primaryKey = ['user_id', 'event_id'];

    protected $fillable = ['user_id', 'event_id'];

    public $incrementing = false;

    public $table = 'event_user';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
