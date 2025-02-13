<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    public function show($id)
    {
        return Location::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location_name' => 'required|string|max:100',
            'address' => 'nullable|string|max:150',
            'city' => 'nullable|string|max:50',            
        ]);

        return Location::create($validated);
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $validated = $request->validate([
            'location_name' => 'string|max:100',
            'address' => 'string|max:150|nullable',
            'city' => 'string|max:50|nullable',
        ]);

        $location->update($validated);
        return $location;
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return response(null, 204);
    }
}
