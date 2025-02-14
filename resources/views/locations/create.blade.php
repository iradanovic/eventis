@extends('layouts.app')

@section('content')
    <h1>Add New Location</h1>
    <form action="{{ route('locations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="location_name">Location Name</label>
            <input type="text" name="location_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Save Location</button>
    </form>
@endsection
