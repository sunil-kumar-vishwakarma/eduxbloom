<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProgramApplyNow;

class ProgramApplyNowController extends Controller
{


     public function index()
    {
        $program_apply_now = UserProgramApplyNow::latest()->get();
        return view('admin.program_apply_now', compact('program_apply_now'));
    }

    // Delete a mentor application
    public function destroy($id)
    {
        $mentor = UserProgramApplyNow::findOrFail($id);
        $mentor->delete();

        return redirect()->back()->with('success', 'Program Apply application deleted successfully.');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'whats_app_number' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'studies_level' => 'required|string|max:255',
            'program_id' => 'required|string|max:255',
        ]);


        // Create the program
        $program = new UserProgramApplyNow();
        $program->full_name = $validated['full_name'];
        $program->dob = $validated['dob'];
        $program->location = $validated['location'];
        $program->whats_app_number = $validated['whats_app_number'];
        $program->email = $validated['email'];
        $program->studies_level = $validated['studies_level'];
        $program->program_id = $validated['program_id'];

        $program->save();
 return response()->json(['success' => true, 'message' => 'Application submitted successfully.']);
        // return redirect()->route('discover_program.index')->with('success', 'Program created successfully.');
    }

}
