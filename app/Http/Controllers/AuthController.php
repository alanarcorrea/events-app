<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUser;
use App\Http\Requests\RegisterUser;
use App\Services\Auth\Login;
use App\Services\Auth\Register;
use App\Http\Resources\User as UserResource;


use App\User;
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(LoginUser $request, Login $loginService)
    {
        try {
            $data = $loginService->signUser($request->toArray());

            return response()->json(['data' => $data], 200);

        } catch(\Exception $exception) {

            return response()->json(['message' => __('errors.unauthenticated')], 401);
        }
    }

    public function me()
    {
        return response()->json(
            new UserResource(auth()->user())
        );
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    public function register(RegisterUser $request, Register $registerService)
    {
        $data = $registerService->handle($request);

        return response()->json(['data' => $data], 200);
    }
}