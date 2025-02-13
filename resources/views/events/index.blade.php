@extends('layouts.app')

@section('content')
    <h1>Events</h1>

    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create New Event</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Location</th>
                <th>Event Type</th>
                <th>Organizer</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>
                        <a href="{{ route('events.show', $event->id) }}">{{ $event->event_name }}</a>
                    </td>
                    <td>{{ $event->description }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->start_time)->format('d.m.Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->end_time)->format('d.m.Y H:i') }}</td>
                    <td>{{ $event->location->location_name ?? 'N/A' }}</td>
                    <td>{{ $event->eventType->event_type_name ?? 'N/A' }}</td>
                    <td>{{ $event->organizer->first_name ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
