<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventUser;

class EventUserController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $participant = EventUser::create([
            'user_id' => auth()->id(),
            'event_id' => request()->event_id,
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
