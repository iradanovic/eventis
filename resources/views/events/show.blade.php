@extends('layouts.app')

@section('content')
    <h1>{{ $event->event_name }}</h1>

    @if($event->picture)
        <img src="{{ asset('storage/' . $event->picture) }}" alt="Event Image" class="img-fluid rounded border mb-3" style="max-width: 300px;">
    @else
        <img src="https://placehold.co/300x150?text=No+Image" class="img-fluid rounded border mb-3">
    @endif

    <p><strong>Start:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('d.m.Y H:i') }}</p>
    <p><strong>End:</strong> {{ \Carbon\Carbon::parse($event->end_time)->format('d.m.Y H:i') }}</p>
    <p><strong>Location:</strong> {{ $event->location->location_name ?? 'N/A' }}</p>
    <p><strong>Type:</strong> {{ $event->eventType->event_type_name ?? 'N/A' }}</p>
    <p><strong>Organizer:</strong> {{ $event->organizer->first_name ?? 'N/A' }} {{ $event->organizer->last_name ?? '' }}</p>

    <div class="card mt-3">
        <div class="card-body">
            <h5>Description</h5>
            <p>{{ $event->description }}</p>
        </div>
    </div>

    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Back to Events</a>
@endsection
