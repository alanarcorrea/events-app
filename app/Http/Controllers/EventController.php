<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Event as EventResource;
use App\Http\Requests\StoreEvent;
use App\Http\Requests\UpdateEvent;
use App\Services\Events\Store;
use App\Services\Events\Update;
use App\Services\Events\Destroy;


class EventController extends Controller
{
    public function index()
    {
        return EventResource::collection(Event::paginate(config('paginage.DEFAULT_PAGINATE')));
    }

    public function create()
    {
        return response()->json([
            'message' => __('messages.allowed_access'),
        ], 202);
    }

    public function store(StoreEvent $request ,Store $storeService)
    {
        try {
            $event = $storeService->handle($request);

			return (new EventResource($event))
					->additional(['data' => [
							'message' => __('messages.attribute_created', ['attribute' => __('attributes.company')]),
					]]);

        } catch(ExceptionAlias $exception) {
             return response()->json([
                 'error' => $exception->getMessage()
             ], 403);
        }
    }

    public function show(Event $event)
    {
        return new EventResource($event);
    }

    public function edit(Event $event)
    {
        return new EventResource($event);
    }

    public function update(Event $event, UpdateEvent $request, Update $updateService)
    {
        try {
            $updateService->handle($request, $event);

			return (new EventResource($event))
					->additional(['data' => [
							'message' => __('messages.attribute_updated', ['attribute' => __('attributes.company')]),
					]]);

        } catch(ExceptionAlias $exception) {
             return response()->json([
                 'error' => $exception->getMessage()
             ], 403);
        }   
    }

    public function destroy(Event $event, Destroy $destroyService)
    {
        try {
            $destroyService->handle($event);

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
