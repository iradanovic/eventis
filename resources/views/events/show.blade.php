@extends('layouts.app')

@section('content')
    <h1>{{ $event->event_name }}</h1>

    @if($event->picture)
        <img src="{{ $event->picture }}" class="img-fluid mb-3" alt="{{ $event->event_name }}">
    @else
        <img src="https://placehold.co/600x300?text=No+Image" class="img-fluid mb-3" alt="No Image">
    @endif

    <p>{{ $event->description }}</p>
    <p><strong>Start:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('d.m.Y H:i') }}</p>
    <p><strong>End:</strong> {{ \Carbon\Carbon::parse($event->end_time)->format('d.m.Y H:i') }}</p>
    <p><strong>Location:</strong> {{ $event->location->location_name ?? 'N/A' }}</p>
    <p><strong>Type:</strong> {{ $event->eventType->event_type_name ?? 'N/A' }}</p>

    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Back to Events</a>
@endsection
