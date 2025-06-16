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




    public function show($id)
    {
        $user = Profile::find($id); // Find user by ID
        if (!$user) {
            return redirect()->route('admin.profile')->with('error', 'User not found');
        }
        return view('admin.profile', compact('user'));
    }
    
    
    
}
