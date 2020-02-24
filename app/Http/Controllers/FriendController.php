<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Friend as FriendResource;
use App\Http\Requests\StoreFriend;
use App\Http\Requests\UpdateFriend;
use App\Services\Friends\Store;
use App\Services\Friends\Update;
use App\Services\Friends\Destroy;
use App\Friend;


class FriendController extends Controller
{
    public function index()
    {
        return FriendResource::collection(Friend::paginate(config('paginate.DEFAULT_PAGINATE')));
    }

    public function create()
    {
        return response()->json([
            'message' => __('messages.allowed_access'),
        ], 202);
    }

    public function store(StoreFriend $request ,Store $storeService)
    {
        try {
            $friend = $storeService->handle($request);

			return (new FriendResource($friend))
					->additional(['data' => [
							'message' => __('messages.attribute_created', ['attribute' => __('attributes.company')]),
					]]);

        } catch(ExceptionAlias $exception) {
             return response()->json([
                 'error' => $exception->getMessage()
             ], 403);
        }
    }

    public function show(Friend $friend)
    {
        return new FriendResource($friend);
    }

    public function edit(Friend $friend)
    {
        return new FriendResource($friend);
    }

    public function update(Friend $friend, UpdateFriend $request, Update $updateService)
    {
        try {
            $updateService->handle($request, $friend);

			return (new FriendResource($friend))
					->additional(['data' => [
							'message' => __('messages.attribute_updated', ['attribute' => __('attributes.company')]),
					]]);

        } catch(ExceptionAlias $exception) {
             return response()->json([
                 'error' => $exception->getMessage()
             ], 403);
        } 
    }

    public function destroy(Friend $friend, Destroy $destroyService)
    {
        try {
            $destroyService->handle($friend);

            return response()->json([
			    'message' => __('messages.attribute_deleted', ['attribute' => __('attributes.skill')]),
            ], 201);

        } catch(ExceptionAlias $exception) {
             return response()->json([
                 'error' => $exception->getMessage()
             ], 403);
        }
    }
}
