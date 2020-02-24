<?php

namespace App\Services\Auth;

use App\User;
use Flugg\Responder\Exceptions\Http\UnauthorizedException;

class Register
{
    public function handle ($credentials)
    {
        $user = User::create([
            'email'    => request()->email,
            'password' => request()->password,
            'name' => request()->name,
            'avatar' => request()->avatar,
            'phone' => request()->phone,
            'rg' => request()->rg,
            'company_id' => request()->company_id,
        ]);

        // $user->assignRole('colleague');

        $token = auth()->login($user);

        return [
            'access_token' => $token,
            'token_type'    => 'bearer',
            'expires_in'    => auth()->factory()->getTTL() * 60,
        ];
    }
}
