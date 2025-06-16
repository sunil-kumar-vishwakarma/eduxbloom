<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    // Display the list of colleges
    public function index()
    {
        $colleges = College::all(); // Fetch all colleges
        return view('college.index', compact('colleges'));
    }

    // Show the form to create a new college
    public function create()
    {
        return view('college.create-college');
    }

    // Store a new college in the database
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'zone' => 'required|string|max:255',
            ]);

            College::create($validated);

            return redirect()->route('colleges.index')->with('success', 'College created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create the college. Please try again.']);
        }
    }

    // Show the form to edit an existing college
    public function edit($id)
    {
        $college = College::findOrFail($id);
        return view('college.edit-college', compact('college'));
    }

    // Update an existing college
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'zone' => 'required|string|max:255',
            ]);

            $college = College::findOrFail($id);
            $college->update($request->all());

            return redirect()->route('colleges.index')->with('success', 'College updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update the college. Please try again.']);
        }
    }

    // Delete an existing college
    public function destroy($id)
    {
        try {
            $college = College::findOrFail($id);
            $college->delete();
    
            return redirect()->route('colleges.index')->with('success', 'College deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('colleges.index')->with('error', 'Failed to delete the college. Please try again.');
        }
    }
    

    // Show the details of a specific college (as a JSON response)
    public function show($id)
{
    $college = College::findOrFail($id);
    return response()->json($college);
}

}
