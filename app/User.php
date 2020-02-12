<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function friends()
    {
        return $this->hasMany('App\Friend');
    }

    public function user_wallet()
    {
        return $this->hasOne('App\UserWallet');
    }

    public function events()
    {
        return $this->belongsToMany('App\Event');
    }
}
