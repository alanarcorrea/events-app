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
            'confirmation_deadline' => request()->confirmation_deadline,
            'minimun_people' => request()->minimun_people,
            'status' => config('status.CREATED'),
        ]);

        return $event;
    }
}