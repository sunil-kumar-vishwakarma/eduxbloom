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
        ]);

        // Generate a JWT token for the user
        $token = JWTAuth::fromUser($user);

        // Return the token and user information
        return response()->json([
            'user' => $user,
            'token' => $token,
            'token_type' => 'bearer',
        ], 200);
    }

    /**
     * Authenticate a user and return a JWT token.
     */
    public function login(Request $request)
    {
        // Validate login credentials
        $credentials = $request->only('email', 'password');

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
public function userProfile(Request $request)
{
    $user = Auth::guard('api')->user();
// print_r($user);die;
    if (!$user) {
        return response()->json([
            'error' => 'Unauthorized',
            'status' => 401,
        ], 401);
    }

    return response()->json([
        'message' => 'Profile fetched successfully',
        'data' => $user,
    ], 200);
}

    
}
