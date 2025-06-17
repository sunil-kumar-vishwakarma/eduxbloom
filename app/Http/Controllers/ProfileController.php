<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function edit($id)
    {
        $user = Profile::findOrFail($id);
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $profile = $user->profile;
        
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        $profile->address = $request->input('address');
        $profile->birthday = $request->input('birthday');
        
        // Handle profile photo upload if applicable
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $profile->profile_photo = $path;
        }
        
        $profile->save();
        

        return redirect()->route('profile', ['id' => $id])->with('success', 'Profile updated successfully.');
    }

  public function userUpdate(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'dob' => 'required|date',
        'language' => 'required|string',
        'citizenship' => 'required|string',
        'passportNumber' => 'required|string',
        'passportExpiry' => 'nullable|date',
        'maritalStatus' => 'required|in:single,married',
        'gender' => 'required|in:male,female',
    ]);

    // Update User basic info
    $user->update([
        'name' => $request->name,
        'middle_name' => $request->middle_name,
        'email' => $request->email,
    ]);

    // Create or update user detail
    $user->details()->updateOrCreate(
        ['user_id' => $user->id],
        [   'middle_name' => $request->middle_name,
            'dob' => $request->dob,
            'language' => $request->language,
            'citizenship' => $request->citizenship,
            'passport_number' => $request->passportNumber,
            'passport_expiry' => $request->passportExpiry,
            'marital_status' => $request->maritalStatus,
            'gender' => $request->gender,
        ]
    );

    return response()->json(['success' => true, 'message' => 'Profile updated successfully!']);
}


public function updateAddress(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'address' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'country' => 'required|string',
        'zip' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string'
    ]);

    $user->address()->updateOrCreate(
        ['user_id' => $user->id],
        $request->only(['address', 'city', 'state', 'country', 'zip', 'email', 'phone'])
    );

    return response()->json(['success' => true, 'message' => 'Address updated successfully!']);
}



    public function show($id)
    {
        $user = Profile::find($id); // Find user by ID
        if (!$user) {
            return redirect()->route('admin.profile')->with('error', 'User not found');
        }
        return view('admin.profile', compact('user'));
    }
    
    
    
}
