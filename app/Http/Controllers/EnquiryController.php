<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = Enquiry::all();
        return view('enquiries.index', compact('enquiries'));
    }

    public function show($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        return response()->json($enquiry);
    }

    public function destroy($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();
        return redirect()->route('enquiries.index')->with('success', 'Enquiry deleted successfully');
    }

public function toggleStatus($id)
{
    $enquiry = Enquiry::find($id);

    if (!$enquiry) {
        return response()->json(['message' => 'Enquiry not found'], 404);
    }

    // Toggle status
    $enquiry->status = $enquiry->status === 'Achieved' ? 'Rejected' : 'Achieved';
    $enquiry->save();

    return response()->json(['status' => $enquiry->status]);
}






    
    
}
