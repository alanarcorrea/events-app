<?php

namespace App\Services\Events;

use Illuminate\Validation\UnauthorizedException;
use App\Event;
use App\EventWallet;
use App\UserWallet;
use App\EventUser;
use Exception;

class Leave
{
    public function handle ($event): void
    {
        $userWallet = UserWallet::find(auth()->id());

        $eventWallet = EventWallet::where('event_id', $event->id)->first();

        $userWallet->update([
            'value' => $userWallet->value + $eventWallet->unit_value,
        ]);

        $eventWallet->update([
           'amount' => $eventWallet->amount - $eventWallet->unit_value,
        ]);

        EventUser::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
        ]);
            
        $participants = EventUser::where('event_id', $event->id)->count();

        if ($participants >= $event->minimum_people) {
            $event->update([
                'status' => 'confirmado',
            ]);
        };
    }
}