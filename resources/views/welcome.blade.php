@extends('layouts.app')

@section('content')
    
    <h1 class="mb-4">Upcoming Events</h1>

    @if($events->isEmpty())
        <p>No events available at the moment.</p>
    @else
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if($event->picture)
                            <img src="{{ asset('storage/' . $event->picture) }}" alt="Event Image" class="img-fluid" style="max-width: 300px;">
                        @else
                            <img src="https://placehold.co/300x150?text=No+Image" class="img-fluid">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->event_name }}</h5>
                            <p class="card-text">
                                {{ Str::limit($event->description, 100) }}
                            </p>
                            <p><strong>Start:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('d M Y H:i') }}</p>
                            <p><strong>End:</strong> {{ \Carbon\Carbon::parse($event->end_time)->format('d M Y H:i') }}</p>
                            <p><strong>Location:</strong> {{ $event->location->location_name ?? 'N/A' }}</p>
                            <p><strong>Type:</strong> {{ $event->eventType->event_type_name ?? 'N/A' }}</p>
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection 
