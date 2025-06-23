<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
use App\Models\User;
use App\Models\Page;
use App\Models\Blog;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\URL;

use App\Models\Program;
use App\Models\Country;
use App\Models\Stat;
use App\Models\City;
use App\Models\School;
use App\Models\EducationSummary;
use App\Models\MyApplication;
use App\Models\UserTestScore;
use App\Models\GreGmatScore;
use App\Models\UserAttendSchool;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class ApiController extends Controller
{
    //
     public function register(Request $request)
    {
        // Validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Return validation errors, if any
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create the user
        $user = Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1,
        ]);

       $verificationUrl = URL::temporarySignedRoute(
        'verification.verify', // this must match your route name
        Carbon::now()->addMinutes(60), // valid for 60 minutes
        ['id' => $user->id, 'hash' => sha1($user->getEmailForVerification())]
    );

         event(new Registered($user));


        // Generate a JWT token for the user
        $token = JWTAuth::fromUser($user);

        // Return the token and user information
        // return response()->json([
        //     'message' => 'OTP sent to your email. Please verify to complete registration.',
        //     'user' => $user,
        //     'token' => $token,
        //     'token_type' => 'bearer',
            
        // ], 200);
        return response()->json([
            'message' => 'A verification link has been sent to your email. Please check your inbox to verify and complete your registration.',
            'email' => $user->email,
            'verify_url' => $verificationUrl
        ], 200);
    }


    public function verifyEmail($id, $hash)
    {
        $user = User::findOrFail($id);

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return response()->json(['message' => 'Invalid verification link'], 403);
        }

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return redirect('/userdashboard')->with(['message' => 'Email verified successfully']);
        // return response()->json(['message' => 'Email verified successfully']);
    }



    public function resendVerification(Request $request)
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Already verified']);
        }

        // Generate temporary signed URL for email verification
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', // Route name
            Carbon::now()->addMinutes(60), // Expiry time
            [
                'id' => $user->id,
                'hash' => sha1($user->getEmailForVerification()), // Match what Laravel expects
            ]
        );
        
        $user->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Verification link generated.',
            'verify_url' => $verificationUrl,
        ]);
    }


    /**
     * Authenticate a user and return a JWT token.
     */
    public function login(Request $request)
    {
        // Validate login credentials
       

        $credentials = $request->only('email', 'password');

         $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            return response()->json(['success' => false, 'message' => 'No user exists with the provided email.'], 401);
        }
        // Check if user exists and has role_id = 1
        if (!$user || $user->role_id != 1) {
            return response()->json(['success' => false, 'message' => 'This email does not belong to a student account.'], 401);
        }

        // Attempt to authenticate the user and generate a token
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid email or password'], 401);
        }

        // Return the token and authenticated user information
        return response()->json([
            'user' => auth()->user(),
            'token' => $token,
            'token_type' => 'bearer',
        ]);
    }


    //  public function updatePassword(Request $request)
    // {

    //     if (Auth::Check()) {

    //         $validator = \Validator::make(
    //             $request->all(), [
    //                 'old_password' => 'required',
    //                 'password' => 'required|min:6',
    //                 'password_confirmation' => 'required|same:password',
    //             ]
    //         );
    //         if ($validator->fails()) {
    //             $messages = $validator->getMessageBag();
                
    //             return response()->json($messages->first(), 422);
    //             // return redirect()->back()->with('error', $messages->first());
    //         }
    //         print_r($request->all());die;
    //         $objUser = Auth::user();
            
    //         $request_data = $request->All();
    //         $current_password = $objUser->password;
    //         if (Hash::check($request_data['old_password'], $current_password)) {
    //             $user_id = Auth::User()->id;
    //             $obj_user = User::find($user_id);
    //             $obj_user->password = Hash::make($request_data['password']);
    //             $obj_user->save();

    //             return $this->sendResponse($objUser, 'Password successfully updated.');
    //         } else {

    //             return $this->sendResponse($objUser, 'Please enter correct current password.');
    //         }
    //     } else {
    //         return $this->sendResponse( \Auth::user()->id, 'Something is wrong.');
            
    //     }
    // }

 public function updatePassword(Request $request)
{
    $user = Auth::guard('api')->user();

    if (!$user) {
        return response()->json(['error' => 'Unauthorized access.'], 401);
    }

    $validator = Validator::make($request->all(), [
        'old_password' => 'required',
        'password' => 'required|min:6|confirmed', // expects password_confirmation in request
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()->first()], 422);
    }

    if (!Hash::check($request->old_password, $user->password)) {
        return response()->json(['error' => 'Your current password is incorrect.'], 400);
    }

    $user->password = Hash::make($request->password);
    $user->save();

    return response()->json(['message' => 'Password successfully updated.'], 200);
}

    public function updateUserProfile(Request $request)
{
    try {
        $user = Auth::guard('api')->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
        }

        $id = $user->id;
        $profilePath = $user->profile; // Default to existing

        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('/user/profile'), $filename);
            $profilePath = '/user/profile/' . $filename;

            // Update user profile path in database
            DB::table('users')->where('id', $id)->update(['profile' => $profilePath]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Profile updated successfully',
            'profile_url' => $profilePath,
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'error' => true,
            'message' => $e->getMessage(),
            'status' => 500,
        ], 500);
    }
}

public function forgotPassword(Request $request)
{
    // Validate request
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);

    // Fetch user
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    // Generate OTP
    $otp = rand(100000, 999999);

    // Store OTP in password_resets table
    DB::table('password_reset_otps')->updateOrInsert(
        ['email' => $request->email],
        [
            'otp' => $otp,
            'created_at' => Carbon::now(),
            'expires_at' => Carbon::now()->addMinutes(3) // Correct expiry
        ]
    );

    // Send OTP via email
    Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
        $message->to($request->email)
                ->subject('Password Reset OTP');
    });

    $token = JWTAuth::fromUser($user);

    return response()->json([
        'email' => $request->email,
        'message' => 'OTP sent successfully',
        'token' => $token, // Only valid if Sanctum is used
        'type' => 'bearer'
    ], 200);
}

    public function verifyOtp(Request $request)
{
    // Validate request
    $validator = Validator::make($request->all(), [
        // 'email' => 'required|email|exists:password_reset_otps,email',
        'otp' => 'required|digits:6'
    ]);

    if ($validator->fails()) {
        return response()->json(['message' => $validator->errors()], 400);
    }

    // Fetch OTP record
    $otpRecord = DB::table('password_reset_otps')
    // ->where('email', $request->email)
                                 ->where('otp', $request->otp)
                                 ->first();

    // Check if OTP exists
    if (!$otpRecord) {
        return response()->json(['message' => 'Invalid OTP.'], 400);
    }

    // Check if OTP is expired
    if (Carbon::now()->greaterThan($otpRecord->expires_at)) {
        return response()->json(['message' => 'OTP has expired. Please request a new one.'], 400);
    }

    // Mark OTP as verified
    DB::table('password_reset_otps')
    // ->where('email', $request->email)
    ->where('otp', $request->otp)
    ->update(['is_verified' => true]);

    
    return response()->json([
        'message' => 'OTP verified successfully',
        'email' => $otpRecord->email,
        'type' => 'bearer'
    ], 200);


    return response()->json(['message' => 'OTP verified successfully.'], 200);
}


    public function reset(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password',
        
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }


        
    $user = User::where('email', $request->email)->first();
    if(!empty($user)){
    $user->password = Hash::make($request->password);
    $user->save();

    return response()->json(['email'=>$request->email, 'message'=>'Password has been reset successfully']);
    } else {

        return response()->json(['email'=>$request->email, 'message'=>'Please enter correct current email.']);
    }

}



    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

    public function privacyPolicy(){
        $privacy_policy = Page::where('type', 'privacy')->first();
        return response()->json([
        'message' => 'Get Privacy Policy Successfully',
        'data' => $privacy_policy,
    ], 200);

    }

    public function termAndCondition(){
         $terms_and_condition = Page::where('type', 'privacy')->first();
        return response()->json([
        'message' => 'Get Term Condition Successfully',
        'data' => $terms_and_condition,
    ], 200);

    }

    public function blogs(){
        $blogs = Blog::all();
        return response()->json([
        'message' => 'Get Blogs Successfully',
        'data' => $blogs,
    ], 200);

    }

    public function aboutus(){
        $blogs = Blog::all();
        return response()->json([
        'message' => 'Get Blogs Successfully',
        'data' => $blogs,
    ], 200);

    }
// public function userProfile(Request $request)
//     {
//         return response()->json([
//         'message' => 'User profile fetched successfully',
//         'user' => $request->user(),
//     ]);
//     }

    public function userProfile()
{
    try {
        // $user = JWTAuth::parseToken()->authenticate();
        $userid = Auth::guard('api')->user();
         $user = \App\Models\User::with(['details', 'address'])->where('role_id',1)->find($userid);

        // print_r($user->details);die;
        $countries = Country::all();
        $stat = Stat::all();
        $city = City::all();


        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json([
            'message' => 'Profile fetched successfully',
            'data'    => $user,
            'countries'    => $countries,
            'stat'    => $stat,
            'city'    => $city,
        ], 200);
    } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
        return response()->json(['error' => 'Token expired'], 401);
    } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
        return response()->json(['error' => 'Invalid token'], 401);
    } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
        return response()->json(['error' => 'Token not found'], 401);
    }
}

public function userProgramList(){
    $programs = Program::orderBy('id','desc')->get();
    return response()->json([
            'message' => 'Program fetched successfully',
            'data'    => $programs,
        ], 200);
}

public function myProgramList(){
    $user = Auth::guard('api')->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
        }
       $userId = $user->id;
    $programs = MyApplication::with(['program'])->where('user_id',$userId)->orderBy('id','desc')->get();
    
    return response()->json([
            'message' => 'My Program List',
            'data'    => $programs,
        ], 200);
}

 public function myApplicationStore(Request $request)
{
    $request->validate([
        'program_id' => 'required|string',
        
    ]);

 $programs =  MyApplication::create([
        'user_id' => auth()->id(),
        'program_id' => $request->program_id,
        'payment_status' => 'Pending',
        'status' => 'active',
    ]);

    return response()->json([
            'message' => 'Application submitted successfully!',
            'data'    => $programs,
        ], 200);
    
}

public function education_history()
    {
        $educationSummary = EducationSummary::where('user_id',Auth::id())->first();
        $user = Auth::user()->load('attendedSchools');
         $attendedSchools = $user->attendedSchools; // assuming a relationship

          return response()->json([
            'message' => 'Education History Details!',
            'educationSummary'    => $educationSummary,
            'attendedSchools'    => $attendedSchools,
            // 'user'    => $user,
        ], 200);
        
    }


     public function user_testScore()
    {
       $userTestScore = UserTestScore::where('user_id',Auth::id())->first();
       $greGmatScore = GreGmatScore::where('user_id',Auth::id())->where('exam_type','GMAT')->first();
       $greGmatScoreGRE = GreGmatScore::where('user_id',Auth::id())->where('exam_type','GRE')->first();

       return response()->json([
            'message' => 'Test Score Details!',
            'userTestScore'    => $userTestScore,
            'greGmatScore'    => $greGmatScore,
            'greGmatScoreGRE'    => $greGmatScoreGRE,
            
        ], 200);
        
    }


     
     public function userUpdate(Request $request)
{
    // $user = JWTAuth::parseToken()->authenticate();

    $user = Auth::guard('api')->user();
// print_r($user);die;
    $request->validate([
        'name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        // 'email' => 'required|email|unique:users,email,' . $user->id,
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
        // 'email' => $request->email,
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

    return response()->json(['success' => true, 'message' => 'Profile updated successfully!'], 200);
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

    
}
