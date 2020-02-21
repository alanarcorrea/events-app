<?php

namespace App\Services\Companies;

use Illuminate\Validation\UnauthorizedException;
use App\Company;

class Destroy
{
    public function handle ($company): void
    {
        $company->delete();
    }
}