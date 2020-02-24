<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::paginate(config('paginate.DEFAULT_PAGINATE')));
    }

    public function create()
    {
        return response()->json([
            'message' => __('messages.allowed_access'),
        ], 202);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function edit(User $user)
    {
        return new UserResource($user);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
