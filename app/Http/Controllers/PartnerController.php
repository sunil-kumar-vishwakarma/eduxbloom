<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB;
class PartnerController extends Controller
{
    // Show the list of partners
    public function index()
    {
        $partners = Partner::all();
        return view('partners.index', compact('partners'));
    }
    

    // Show the form for creating a new partner
    public function create()
    {
        return view('partners.create');
    }

    // Store a newly created partner in the database
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'designation' => 'required|string|max:255',
            'email' => 'required|email|unique:partners',
            'contact' => 'required|string|max:15',
            'category' => 'required|string',
            'joined_date' => 'required|date',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        if (Users::where('email', $request->email)->exists()) {
            return response()->json([
                'status' => false,
                'errors' => ['email' => ['The email is already registered in users table.']]
            ], 422);
        }

        DB::beginTransaction();

        try {
            $user = Users::create([
                'name'     => $request->designation,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 2,
            ]);

            $lastInsertedId = $user->id;

            Partner::create([
                'user_id' => $lastInsertedId,
                'email' => $request->email,
                'contact' => $request->contact,
                'designation' => $request->designation ?? '',
                'category' => $request->category,
                'joined_date' => $request->joined_date,
                'status' => $request->status,
            ]);

            DB::commit();

            return redirect()->route('partners.index')->with('success', 'Partner created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    
    // Show a specific partner
    public function show($id)
    {
        $partner = Partner::find($id);
        if ($partner) {
            return response()->json($partner);
        } else {
            return response()->json(['error' => 'Partner not found'], 404);
        }
    }
    

    // Show the form for editing a specific partner
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('partners.edit', compact('partner'));
    }

    // Update a specific partner's information
    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:partners,email,' . $partner->id,
            'contact' => 'required|string|max:15',
            'category' => 'required|string|max:100',
            'joined_date' => 'required|date',
            'status' => 'required|in:Active,Inactive',
        ]);

        $partner->update($validatedData);

        return redirect()->route('partners.index')->with('success', 'Partner updated successfully!');
    }

    // Delete a partner
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully!');
    }

     // toggle status
  public function toggleStatus(Partner $partner)
{
    $partner->status = $partner->status === 'Active' ? 'Inactive' : 'Active';
    $partner->save();

    return response()->json(['status' => $partner->status]);
}


    
}
