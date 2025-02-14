@extends('layouts.app')

@section('content')
    <h1>Locations</h1>

    <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">Add New Location</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($locations->isEmpty())
        <p>No locations available.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->location_name }}</td>
                        <td>{{ $location->address ?? 'N/A' }}</td>
                        <td>{{ $location->city ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this location?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
