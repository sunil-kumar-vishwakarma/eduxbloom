<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    // Show the verification notice if not verified
    public function notice()
    {
        $user = Auth::user();
        //  $user = Users::find($id);

        $user->email_verified_at = now();
        $user->save();

        // return redirect('/userdashboard')->with('verified', true);
        return redirect('/userdashboard');
        // return view('auth.verify-email');
    }

    // Handle the verification link click
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill(); // Marks email_verified_at

        return redirect('/userdashboard')->with('verified', true);
    }

    // Resend verification email
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/userdashboard');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}

