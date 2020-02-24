<?php


namespace App\Services\Auth;

use App\Http\Resources\User as UserResource;
use Illuminate\Validation\UnauthorizedException;

class Login
{
    public function signUser(Array $credentials)
    {
        $token = auth()->attempt($credentials);

        if (!$token) {
            throw new UnauthorizedException(__('auth.failed'));
        }

        return [
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => auth()->factory()->getTTL() * 60,
            'user' => new UserResource(auth()->user()),
        ];
    }
}
