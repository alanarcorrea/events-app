<?php

namespace App\Services\Friends;

use Illuminate\Validation\UnauthorizedException;
use App\Friend;

class Destroy
{
    public function handle ($friend): void
    {
        $friend->delete();
    }
}