<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Blog;
use App\Models\Page;
use App\Models\User;
use App\Models\Stat;
use App\Models\ContactInfo;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //


    // public function home(){
    //     $home = Home::all();
    //     return view('home.index', compact('home'));

    // }

   public function homePage()
{
    $home = Home::all();
    $stat = Stat::first(); // Assuming single row holds stats

    return view('home', compact('home', 'stat'));
}

   public function contactus()
{
    $home = Home::all(); // (If you're using this data in the view)
    $contacts = ContactInfo::all(); // Fetch dynamic contact info cards
    
    return view('contact', compact('home', 'contacts'));
}

    public function studentRegister()
    {
        $home = Home::all();
        return view('student_register', compact('home'));
    }
    public function studentLogin()
    {
        $home = Home::all();
        return view('student_login', compact('home'));
    }
    public function forgotpassword()
    {
        return view('forgotpassword');
    }
    public function forgotpassword2()
    {

        return view('forgotpassword2');
    }
    public function youngleaders()
    {

        return view('youngleaders');
    }
    public function team_login()
    {

        return view('team_login');
    }
    public function blogdetails()
    {

        return view('blogdetails');
    }
    // public function sendResetLink(Request $request)
    //     {

    //         $request->validate([
    //             'email' => 'required|email|exists:users,email',
    //         ]);

    //         $status = Password::sendResetLink(
    //             $request->only('email')
    //         );

    //         return $status === Password::RESET_LINK_SENT
    //             ? back()->with(['success' => __($status)])
    //             : back()->withErrors(['error' => __($status)]);
    //     }


    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Manually check if email exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('forgotpassword')->with('error', __('Email does not exist'));
            // return back()->withErrors(['error' => 'Email does not exist']);
        }

        // Send reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // return $status === Password::RESET_LINK_SENT
        //     ? back()->with(['success' => __($status)])
        //     : back()->withErrors(['error' => __($status)]);

        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->route('forgotpassword')->with('success', __($status));
        } else {
            return redirect()->route('forgotpassword')->with('error', __($status));
        }
    }

    public function showResetForm(Request $request, $token)
    {
        return view('forgotpassword2', ['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('student-login')->with('success', __($status))
            : back()->withErrors(['error' => [__($status)]]);
    }

    public function student()
    {
        $home = Home::all();
        return view('student', compact('home'));
    }
    public function explrSchoolPrograms()
    {
        $home = Home::all();
        return view('explr_School_programs', compact('home'));
    }
    public function partner()
    {
        $home = Home::all();
        return view('partner', compact('home'));
    }

    public function institutions()
    {
        $institutions = Home::all();

        return view('Institutions', compact('institutions'));
    }

    public function events()
    {
        $events = Home::all();
        return view('events', compact('events'));
    }

    // public function blogs(){
    //     $blogs = Home::all();
    //         return view('blog', compact('blogs'));
    //     }
    public function search()
    {
        $search = Home::all();
        return view('search', compact('search'));
    }
    public function web()
    {
        $web = Home::all();
        return view('web', compact('web'));
    }
    public function webinar()
    {
        $webinar = Home::all();
        return view('webinar', compact('webinar'));
    }
    public function webinarLearnmore()
    {
        $webinar_learnmore = Home::all();
        return view('webinar_learnmore', compact('webinar_learnmore'));
    }
    public function webinarReadmore()
    {
        $webinar_readmore = Home::all();
        return view('webinar_readmore', compact('webinar_readmore'));
    }
    public function privacyPolicy()
    {
        // $privacy_policy = Home::all();
        $privacy_policy = Page::where('type', 'privacy')->first();

        return view('privacy_policy', compact('privacy_policy'));
    }
    public function eduxFees()
    {
        $Edux_fees = Home::all();
        return view('edux_fees', compact('Edux_fees'));
    }

    public function termAndCondition()
    {
        // $terms_and_condition = Home::all();
        $terms_and_condition = Page::where('type', 'privacy')->first();

        return view('terms_and _condition', compact('terms_and_condition'));
    }


    public function blogs()
    {
        $blogs = Blog::where('status', 'Published')
            ->orderBy('published_date', 'desc')
            ->get();

        return view('blog', compact('blogs')); // assuming your blade is resources/views/blog.blade.php
    }
}
