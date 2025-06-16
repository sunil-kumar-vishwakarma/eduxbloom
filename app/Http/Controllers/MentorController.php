<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MentorController extends Controller
{
    // Store mentor application
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:mentors',
            'phone' => 'required|string',
            'school' => 'required|string',
            'country' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation failed.',
            ], 422);
        }

        Mentor::create($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully!',
        ]);
    }

    // Admin view of mentor applications
    public function index()
    {
        $mentors = Mentor::latest()->get();
        return view('admin.mentors', compact('mentors'));
    }

    // Delete a mentor application
    public function destroy($id)
    {
        $mentor = Mentor::findOrFail($id);
        $mentor->delete();

        return redirect()->back()->with('success', 'Mentor application deleted successfully.');
    }
}
