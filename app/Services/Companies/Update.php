<?php

namespace App\Services\Companies;

use Illuminate\Validation\UnauthorizedException;

class Update
{
    public function handle ($request, $company): void
    {
       $company->update($request->all());
    }
}