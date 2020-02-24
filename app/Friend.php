<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = ['name', 'rg', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
