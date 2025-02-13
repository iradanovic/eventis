<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    public function index()
    {
        $eventTypes = EventType::all();
        return view('event_types.index', compact('eventTypes'));
    }

    public function show($id)
    {
        return EventType::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_type_name' => 'required|string|max:50',
        ]);

        return EventType::create($validated);
    }

    public function update(Request $request, $id)
    {
        $eventType = EventType::findOrFail($id);

        $validated = $request->validate([
            'event_type_name' => 'string|max:50',
        ]);

        $eventType->update($validated);
        return $eventType;
    }

    public function destroy($id)
    {
        $eventType = EventType::findOrFail($id);
        $eventType->delete();
        return response(null, 204);
    }
}
