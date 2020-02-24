<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Friend as FriendResource;


class FriendController extends Controller
{
    public function index()
    {
        return FriendResource::collection(Friend::paginate(config('paginage.DEFAULT_PAGINATE')));
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
