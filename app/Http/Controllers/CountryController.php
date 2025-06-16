<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    // Display the list of countries
    public function index()
    {
        $countries = Country::all(); // Fetch all countries
        return view('country.index', compact('countries'));
    }

    // Show the form to create a new country
    public function create()
    {
        return view('country.create-country');
    }

    // Store a new country in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        try {
            Country::create($validated);
            return redirect()->route('countries.index')->with('success', 'Country created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('countries.index')->with('error', 'Failed to create country. Please try again.');
        }
    }

    // Show the form to edit an existing country
    public function edit($id)
    {
        try {
            $country = Country::findOrFail($id);
            return view('country.edit-country', compact('country'));
        } catch (\Exception $e) {
            return redirect()->route('countries.index')->with('error', 'Country not found.');
        }
    }

    // Update an existing country
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        try {
            $country = Country::findOrFail($id);
            $country->update($request->all());
            return redirect()->route('countries.index')->with('success', 'Country updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('countries.index')->with('error', 'Failed to update country. Please try again.');
        }
    }

    // Delete an existing country
    public function destroy($id)
    {
        try {
            $country = Country::findOrFail($id);
            $country->delete();
    
            return redirect()->route('countries.index')->with('success', 'Country deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('countries.index')->with('error', 'Failed to delete the country. Please try again.');
        }
    }
    

    // Show the details of a specific country (as a JSON response)
   public function show($id)
{
    $country = Country::findOrFail($id);
    return response()->json($country);
}

}
