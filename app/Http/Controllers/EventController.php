<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['location', 'eventType', 'organizer'])->get();
        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        return Event::with(['location', 'eventType', 'organizer'])->findOrFail($id);
    }

    public function create()
    {
        $locations = \App\Models\Location::all();    
        $eventTypes = \App\Models\EventType::all();
        $organizers = \App\Models\User::where('user_role', 'admin')->get();
    
        return view('events.create', compact('locations', 'eventTypes', 'organizers'));
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location_id' => 'required|exists:locations,id',
            'event_type_id' => 'required|exists:event_types,id',
            'organizer_id' => 'required|exists:users,id',
            'picture' => 'nullable|string',
        ]);

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }


    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'event_name' => 'string|max:100',
            'description' => 'string|nullable',
            'start_time' => 'date',
            'end_time' => 'date|after:start_time',
            'location_id' => 'exists:locations,id',
            'event_type_id' => 'exists:event_types,id',
            'organizer_id' => 'exists:users,id',
            'picture' => 'nullable|string',
        ]);

        $event->update($validated);
        return $event;
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
    
        return redirect()->route('events.index')->with('success', 'Event successfully deleted!');
    }
    
}
