@extends('layouts.app')

@section('content')

    <h1>Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="event_name">Event Name</label>
            <input type="text" name="event_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="location_id">Location</label>
            <select name="location_id" class="form-control" required>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="event_type_id">Event Type</label>
            <select name="event_type_id" class="form-control" required>
                @foreach($eventTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->event_type_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="organizer_id">Organizer</label>
            <select name="organizer_id" class="form-control" required>
                @foreach($organizers as $organizer)
                    <option value="{{ $organizer->id }}">{{ $organizer->first_name }} {{ $organizer->last_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
