<?php

namespace App\Services\Events;

use Illuminate\Validation\UnauthorizedException;
use App\Event;

class Store
{
    public function handle ($request): Event
    {
        $event = Event::create([
            'title' => request()->title,
            'description' => request()->description,
            'date' => request()->date,
            'hour' => request()->hour,
            'place' => request()->place,
            'address' => request()->address,
            'confirmation_deadline' => request()->confirmation_deadline,
            'minimum_people' => request()->minimum_people,
            'status' => 'open',
        ]);

        return $event;
    }
}