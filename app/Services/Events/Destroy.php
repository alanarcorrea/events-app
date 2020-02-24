<?php

namespace App\Services\Events;

use Illuminate\Validation\UnauthorizedException;
use App\Event;

class Destroy
{
    public function handle ($event): void
    {
        $event->delete();
    }
}