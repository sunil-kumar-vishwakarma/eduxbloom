<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    // Display the list of schools
    public function index()
    {
        $schools = School::all(); // Fetch all schools
        return view('school.index', compact('schools'));
    }

    // Show the form to create a new school
    public function create()
    {
        return view('school.create-school');
    }

    // Store a new school in the database
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'zone' => 'required|string|max:255',
            ]);

            School::create($validated);

            // Redirect with success message
            return redirect()->route('school.index')->with('success', 'School created successfully!');
        } catch (\Exception $e) {
            // Redirect with error message
            return redirect()->route('school.index')->with('error', 'Failed to create school. Please try again.');
        }
    }

    // Show the form to edit an existing school
    public function edit($id)
    {
        try {
            $school = School::findOrFail($id);
            return view('school.edit-school', compact('school'));
        } catch (\Exception $e) {
            return redirect()->route('school.index')->with('error', 'Failed to load the school edit form.');
        }
    }

    // Update an existing school
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'zone' => 'required|string|max:255',
            ]);

            $school = School::findOrFail($id);
            $school->update($request->all());

            // Redirect with success message
            return redirect()->route('school.index')->with('success', 'School updated successfully.');
        } catch (\Exception $e) {
            // Redirect with error message
            return redirect()->route('school.index')->with('error', 'Failed to update school. Please try again.');
        }
    }

    // Delete an existing school
    public function destroy($id)
    {
        try {
            $school = School::findOrFail($id);
            $school->delete();

            // Redirect with success message
            return redirect()->route('school.index')->with('success', 'School deleted successfully.');
        } catch (\Exception $e) {
            // Redirect with error message
            return redirect()->route('school.index')->with('error', 'Failed to delete the school. Please try again.');
        }
    }

    // Show the details of a specific school (as a JSON response)
    public function show($id)
{
    $school = School::findOrFail($id);
    return response()->json($school);
}

}
