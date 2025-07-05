<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Partner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Set 'is_admin' to true if the user's email matches the admin email
            if ($user->email == 'vishnu@sht.com') {
                $user->is_admin = true;
            }

            // Redirect to dashboard if login is successful
            return redirect()->route('dashboard');
        }

        // If authentication fails, redirect back to the login page with an error
        return back()->withErrors(['error' => 'Invalid credentials'])->withInput();
    }



    public function logout(Request $request)
    {
        auth()->logout(); // Logs out the user
        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerates CSRF token for security

        return redirect('/admin/login'); // Redirects to the login page after logout
    }

    public function userLogout(Request $request)
    {
        auth()->logout(); // Logs out the user
        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerates CSRF token for security

        return redirect('/student-login'); // Redirects to the login page after logout
    }
  
    // public function teamLlogin(Request $request)
    // {

    //     $credentials = $request->only('email', 'password');
    //     $useremail = User::where('email',$request->email)->first();
    //     if($useremail->role_id == 2){

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();

    //         return redirect()->route('dashboard');
            
    //         }
    //             }else{
    //                     return back()->withErrors(['error' => 'Invalid credentials'])->withInput();
    //                 }
    //             return back()->withErrors(['error' => 'Invalid credentials'])->withInput();
            
    // }

    public function teamLlogin(Request $request)
{
    $credentials = $request->only('email', 'password');

    $user = User::where('email', $request->email)->first();
   $userPartner = Partner::where('user_id', $user->id)->first();
    
    if (empty($user)) {
        return response()->json(['success' => false, 'message' => 'No user exists with the provided email.'], 401);
    }

    if ($userPartner->status != 'Active') {
        return response()->json(['success' => false, 'message' => 'Your account is currently inactive. Please contact support for admin.'], 401);
    }
   
    if (!$user || $user->role_id != 2) {
        return response()->json(['success' => false, 'message' => 'This email does not belong to a team account.'], 401);
    }

    // Attempt login
    if (Auth::attempt($credentials)) {
        return response()->json(['success' => true, 'redirect' => route('dashboard')]);
    }else{
         return response()->json(['success' => false, 'message' => 'Invalid credentials.'], 401);
    }

}

    // public function studentLogin(Request $request)
    // {

    //     $credentials = $request->only('email', 'password');
    //     $useremail = User::where('email',$request->email)->first();
    //     if($useremail->role_id == 1){

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();
    //         // Redirect to dashboard if login is successful
    //         return redirect()->route('userdashboard');
            
    //         }
    //             }else{
    //                     return back()->withErrors(['error' => 'Invalid credentials'])->withInput();
    //                 }
    //             // If authentication fails, redirect back to the login page with an error
    //             return back()->withErrors(['error' => 'Invalid credentials'])->withInput();
            
    // }

//     public function studentLogin(Request $request)
// {
//     $credentials = $request->only('email', 'password');
    
//     $user = User::where('email', $request->email)->first();

//     if (!$user || $user->role_id != 1) {
//         return back()->withErrors(['error' => 'Invalid credentials'])->withInput();
//     }

//     if (Auth::attempt($credentials)) {
//        $userdata =  Auth::user();
//     //    dd($userdata);
//         return redirect()->route('userdashboard');
//     }

//     return back()->withErrors(['error' => 'Invalid credentials'])->withInput();
// }

public function studentLogin(Request $request)
{
    $credentials = $request->only('email', 'password');

    $user = User::where('email', $request->email)->first();

    if (empty($user)) {
        return response()->json(['success' => false, 'message' => 'No user exists with the provided email.'], 401);
    }
    // Check if user exists and has role_id = 1
    if (!$user || $user->role_id != 1) {
        return response()->json(['success' => false, 'message' => 'This email does not belong to a student account.'], 401);
    }

    // Attempt login
    if (Auth::attempt($credentials)) {
        return response()->json(['success' => true, 'redirect' => route('userdashboard')]);
    }else{
         return response()->json(['success' => false, 'message' => 'Invalid credentials.'], 401);
    }

}

}
