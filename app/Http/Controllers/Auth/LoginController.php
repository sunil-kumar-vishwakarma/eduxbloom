<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    // public function login(Request $request)
    // {
    //     // Validation
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required|string'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => false,
    //             'errors' => $validator->errors()
    //         ], 422);
    //     }

    //     // Find user
    //     $user = Users::where('email', $request->email)->first();

    //     if (!$user || !Hash::check($request->password, $user->password)) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Invalid email or password'
    //         ], 401);
    //     }

    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Login successful',
    //         'data' => $user
    //     ], 200);
    // }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = Users::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // if (! $user->hasVerifiedEmail()) {
    //     return redirect()->route('verification.notice')->withErrors(['email' => 'Please verify your email.']);
    // }

    // Auth::login($user);

    return redirect()->route('userdashboard');
}


 public function teamLlogin(Request $request)
{
    // print_r($request->all());die;
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = Users::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // if (! $user->hasVerifiedEmail()) {
    //     return redirect()->route('verification.notice')->withErrors(['email' => 'Please verify your email.']);
    // }

    // Auth::login($user);

    return redirect()->route('dashboard');
}

}
