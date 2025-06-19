<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use App\Models\EducationSummary;
use App\Models\UserAttendSchool;
use App\Models\UserTestScore;
use App\Models\GreGmatScore;
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


public function educationSummary(Request $request)
{
    $validated = $request->validate([
        'country' => 'required|string|max:100',
        'grade' => 'required|string|max:50',
        'graduated' => 'required|boolean',
    ]);

    EducationSummary::updateOrCreate(
        ['user_id' => Auth::id()],
        $validated + ['user_id' => Auth::id()]
    );

    return response()->json(['message' => 'Education summary saved successfully.']);
}


public function createOrUpdateSchools(Request $request)
{
    $request->validate([
        'schools' => 'required|array',
        'schools.*.name' => 'required|string|max:255',
        'schools.*.location' => 'required|string|max:255',
        'schools.*.start_date' => 'required|date',
        'schools.*.end_date' => 'required|date|after_or_equal:schools.*.start_date',
    ]);

    $user = Auth::user();
    $submittedIds = [];

    foreach ($request->schools as $school) {
        if (!empty($school['id'])) {
            $existing = UserAttendSchool::where('user_id', $user->id)
                        ->where('id', $school['id'])
                        ->first();

            if ($existing) {
                $existing->update([
                    'name' => $school['name'],
                    'location' => $school['location'],
                    'start_date' => $school['start_date'],
                    'end_date' => $school['end_date'],
                ]);
                $submittedIds[] = $existing->id;
            }
        } else {
            $new = UserAttendSchool::create([
                'user_id' => $user->id,
                'name' => $school['name'],
                'location' => $school['location'],
                'start_date' => $school['start_date'],
                'end_date' => $school['end_date'],
            ]);
            $submittedIds[] = $new->id;
        }
    }

    // Delete removed ones
    UserAttendSchool::where('user_id', $user->id)
        ->whereNotIn('id', $submittedIds)
        ->delete();

    return response()->json(['message' => 'School data updated successfully']);
}


public function createOrUpdateTestScore(Request $request)
{
    $validated = $request->validate([
        'test_type' => 'required|string',
        'reading' => 'nullable|integer',
        'listening' => 'nullable|integer',
        'writing' => 'nullable|integer',
        'speaking' => 'nullable|integer',
        'exam_date' => 'nullable|date',
    ]);

    
    $userId = $validated['user_id'] ?? Auth::id();

    $test = UserTestScore::where('user_id', $userId)
        ->first();

    if ($test) {
        // Update existing record
        $test->update($validated + ['user_id' => $userId]);
    } else {
        // Create new record
        $test = UserTestScore::create($validated + ['user_id' => $userId]);
    }


    return response()->json(['message' => 'User test saved successfully', 'data' => $test]);
}

public function storeOrUpdateGreGmatScore(Request $request)
{
    $validated = $request->validate([
        'exam_type' => 'required|in:GRE,GMAT',
        'score' => 'nullable|string|max:255',
        'exam_date' => 'nullable|date',
    ]);

    $userId = Auth::id(); // Or $request->user_id if coming from admin

    // GreGmatScore::updateOrCreate(
    //     ['user_id' => $userId, 'exam_type' => $validated['exam_type']],
    //     $validated + ['user_id' => $userId]
    // );

     $userId = $validated['user_id'] ?? Auth::id();

    $test = GreGmatScore::where('user_id', $userId)->where('exam_type' , $validated['exam_type'])
        ->first();

    if ($test) {
        // Update existing record
        $test->update($validated + ['user_id' => $userId]);
    } else {
        // Create new record
        $test = GreGmatScore::create($validated + ['user_id' => $userId]);
    }


    return response()->json(['message' => 'Score saved successfully']);
}


    public function schoolAttended(Request $request)
    {
        $request->validate([
            'schools' => 'required|array',
            'schools.*.name' => 'required|string|max:255',
            'schools.*.location' => 'required|string|max:255',
            'schools.*.start_date' => 'required|date',
            'schools.*.end_date' => 'required|date|after_or_equal:schools.*.start_date',
        ]);

        foreach ($request->schools as $schoolData) {
            UserAttendSchool::create([
                'user_id' => Auth::id(),
                'name' => $schoolData['name'],
                'location' => $schoolData['location'],
                'start_date' => $schoolData['start_date'],
                'end_date' => $schoolData['end_date'],
            ]);
        }

        return response()->json(['message' => 'School data saved.']);
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
