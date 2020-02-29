<?php

namespace App\Services\Events;

use Illuminate\Validation\UnauthorizedException;
use App\Event;
use App\EventWallet;
use App\UserWallet;
use App\EventUser;

class Participate
{
    public function handle ($event): void
    {
        $userWallet = UserWallet::find(auth()->id());

        if (! $userWallet->value >= $event->unit_value) {
            throw new Exception;
        };

        $userWallet->value = $userWallet->value - $event->unit_value;
        $event->amout = $event->amount + $event->unit_value;

        $member = EventUser::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
        ]);
    }
}