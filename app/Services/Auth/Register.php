<?php

namespace App\Services\Auth;

use App\User;
use App\UserWallet;
use Illuminate\Support\Facades\Hash;
use Flugg\Responder\Exceptions\Http\UnauthorizedException;

class Register
{
    public function handle ($credentials)
    {
        $user = User::create([
            'email'    => request()->email,
            'password' => Hash::make(request()->password),
            'name' => request()->name,
            'avatar' => request()->avatar,
            'phone' => request()->phone,
            'rg' => request()->rg,
            'company_id' => request()->company_id,
        ]);

        // $user->assignRole('colleague');

        $token = auth()->login($user);

        $userWallet = UserWallet::create([
            'user_id' => $user->id,
            'value' => 50,
        ]);

        if (! $userWallet){
            throw new Exception;
        }

        return [
            'access_token' => $token,
            'token_type'    => 'bearer',
            'expires_in'    => auth()->factory()->getTTL() * 60,
        ];
    }
}
