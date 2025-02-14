@extends('layouts.app')

@section('content')

    <h1>Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="event_name">Event Name</label>
            <input type="text" name="event_name" class="form-control" value="{{ old('event_name') }}" required>
            @error('event_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" class="form-control" value="{{ old('start_time') }}" required>
            @error('start_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" class="form-control" value="{{ old('end_time') }}" required>
            @error('end_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="location_id">Location</label>
            <select name="location_id" class="form-control" required>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                        {{ $location->location_name }}
                    </option>
                @endforeach
            </select>
            @error('location_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="event_type_id">Event Type</label>
            <select name="event_type_id" class="form-control" required>
                @foreach($eventTypes as $type)
                    <option value="{{ $type->id }}" {{ old('event_type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->event_type_name }}
                    </option>
                @endforeach
            </select>
            @error('event_type_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="organizer_id">Organizer</label>
            <select name="organizer_id" class="form-control" required>
                @foreach($organizers as $organizer)
                    <option value="{{ $organizer->id }}" {{ old('organizer_id') == $organizer->id ? 'selected' : '' }}>
                        {{ $organizer->first_name }} {{ $organizer->last_name }}
                    </option>
                @endforeach
            </select>
            @error('organizer_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="picture">Event Picture</label>
            <input type="file" name="picture" class="form-control">
            @error('picture')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
