<?php

namespace App\Services\Friends;

use Illuminate\Validation\UnauthorizedException;
use App\Friend;

class Store
{
    public function handle ($request): Friend
    {
        $friend = Friend::create([
            'name' => request()->name,
            'rg' => request()->rg,
            'user_id' => request()->user_id,
        ]);

        return $friend;
    }
}