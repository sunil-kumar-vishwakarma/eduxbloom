<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    // Display the list of cities
    public function index()
    {
        $cities = City::all(); // Fetch all cities
        return view('city.index', compact('cities'));
    }

    // Show the form to create a new city
    public function create()
    {
        return view('city.create-city');
    }

    // Store a new city in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'zone' => 'required|string|max:255',
        ]);

        try {
            City::create($validated);
            return redirect()->route('cities.index')->with('success', 'City created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('cities.index')->with('error', 'Failed to create city. Please try again.');
        }
    }

    // Show the form to edit an existing city
    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('city.edit-city', compact('city'));
    }

    // Update an existing city
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'zone' => 'required|string|max:255',
        ]);

        try {
            $city = City::findOrFail($id);
            $city->update($request->all());
            return redirect()->route('cities.index')->with('success', 'City updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('cities.index')->with('error', 'Failed to update city. Please try again.');
        }
    }

    // Delete an existing city
    // Delete an existing city
    public function destroy($id)
    {
        try {
            $city = City::findOrFail($id);
            $city->delete();

            return redirect()->route('cities.index')->with('success', 'City deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('cities.index')->with('error', 'Failed to delete city.');
        }
    }



    public function show($id)
    {
        $city = City::findOrFail($id); // Find the city by ID or return a 404 error
        return response()->json($city);
    }
}
