<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = [
        'fantasy_name', 'company_name', 'cnpj', 'phone', 'address', 'cep', 'city', 'state',
    ];

    protected $table = 'companies';

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
