<?php

namespace App\Services\Friends;

use Illuminate\Validation\UnauthorizedException;

class Update
{
    public function handle ($request, $friend): void
    {
       $friend->update($request->all());
    }
}