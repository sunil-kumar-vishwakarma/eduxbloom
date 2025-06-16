<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show the list of students
    public function index()
    {
        $students = Student::all(); // Fetch all students from the database
        return view('students.index', compact('students')); // Return the view with data
    }

    // Show the form for creating a new student
    public function create()
    {
        return view('students.create');
    }


public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'full_name'   => 'required|string|max:255',
        'email'       => 'required|email|unique:students,email',
        'contact'     => 'required|string|max:15',
        'country'     => 'required|string|max:100',
        'joined_date' => 'required|date',
        'status'      => 'required|in:Active,Inactive', // Validate status directly
    ]);

    // Create the student record
    Student::create($validatedData);

    // Redirect back with success message
    return redirect()->route('students.index')->with('success', 'Student created successfully!');
}


    public function show($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }
    


    // Show the form for editing a specific student
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }


    // Update a specific student's information
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Delete a student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }

    // toggle status
   public function toggleStatus($id)
{
    $student = Student::findOrFail($id);

    // Toggle the status
    $student->status = ($student->status === 'Active') ? 'Inactive' : 'Active';
    $student->save();

    return response()->json(['status' => $student->status]);
}



    
    
}
