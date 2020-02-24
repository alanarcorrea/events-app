<?php

namespace App\Services\Events;

use Illuminate\Validation\UnauthorizedException;

class Update
{
    public function handle ($request, $event): void
    {
       $event->update($request->all());
    }
}