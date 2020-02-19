<?php

namespace App\Services\Companies;

use Illuminate\Validation\UnauthorizedException;
use App\Company;

class Store
{
    public function handle ($request): Company
    {
        $company = Company::create([
            'fantasy_name' => request()->fantasy_name,
            'company_name' => request()->company_name,
            'cnpj' => request()->cnpj,
            'phone' => request()->phone,
            'address' => request()->address,
            'cep' => request()->cep,
            'city' => request()->city,
            'state' => request()->state,
        ]);

        return $company;
    }
}