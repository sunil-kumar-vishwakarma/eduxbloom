<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

use App\Models\Program;
use App\Models\Country;
use App\Models\School;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserDashController extends Controller
{

    public function userdashboard()
    {
        //  $user = Auth::user();
        //  dd($user);
        //  if(!$user){
            return view('userdashboard');
        //  }else{
        //     return redirect()->route('student-login');
            
        //  }
        
    }
    public function usersearchProgram(Request $request)
    {
        
            $schools = School::all();

            $keyword = $request->input('keyword');
            $countries = $request->input('countries');

            $query = Program::query();

            if ($keyword) {
                $query->where('college_course', 'like', '%' . $keyword . '%');
            }

            // if (!empty($countries)) {
            //     $query->where('campus_country', $countries);
            // }
            if ($request->filled('countries') && $request->countries != 'Destination') {
                $query->where('campus_country', $request->countries);
            }

            if ($request->filled('institute') && $request->institute != 'Institute') {
                $query->where('college_name', 'like', '%' . $request->institute . '%');
            }

            if ($request->filled('program_level') && $request->program_level != 'Program') {
                $query->where('program_level', $request->program_level);
            }

            if ($request->filled('field_of_study') && $request->field_of_study != 'Study') {
                $query->where('college_course', $request->field_of_study);
            }

            if ($request->filled('language') && $request->language != 'Language') {
                $query->where('language', $request->language);
            }

            // if ($request->filled('program_tag')) {
            //     $query->where('program_tag', $request->program_tag);
            // }

            $programs = $query->orderBy('id', 'desc')->paginate(12)->withQueryString();

            // Return only program cards in AJAX
            if ($request->ajax()) {
                return view('partials.programs', compact('programs','schools'))->render();
            }

            return view('usersearchProgram', compact('programs','schools'));
        


        
    }
    public function userprofile()
    {
        return view('userprofile');
    }
    public function user_myapplication()
    {
        return view('user_myapplication');
    }
    public function userpayments()
    {
        return view('userpayments');
    }
    public function education_history()
    {
        return view('education_history');
    }
    public function user_testScore()
    {
        return view('user_testScore');
    }

      public function details($id)
    {
        $program = Program::findOrFail($id);
         $country= Country::all();
         return view('user_program_details', compact('program'));
        // return response()->json($program);
    }

}
