<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Country;
use App\Models\School;
use App\Models\MyApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProgramController extends Controller
{

    public function index(Request $request)
    {
        // Get sorting params
        $sortField = $request->get('sort_field', 'university_name');
        $sortOrder = $request->get('sort_order', 'desc');

        // Paginate programs with sorting
        // if(!empty($request->all())){
        // $programs = Program::orderBy($sortField, $sortOrder)->paginate(12);
        // }else{
        // $programs = Program::orderBy('id','desc')->paginate(12);
        // }
        
         if(!empty($request->all())){
        $programs = Program::orderBy($sortField, $sortOrder)->get();
        }else{
        $programs = Program::orderBy('id','desc')->get();
        }


        // $programs = Program::all();
        return view('discover_program.index', compact('programs'));
    }

    // public function search(Request $request)
    // {
    //     // print_r($request->all());die;
    //     $programs = Program::all();
    //     $programs = Program::paginate(10); // Adjust per-page count as needed


    //     return view('search', compact('programs'));
    // }

    // public function search(Request $request)
    // {
    //     $keyword = $request->input('keyword');
    //     $countries = $request->input('countries');

    //     $query = Program::query();

    //     if ($keyword) {
    //         $query->where('college_course', 'like', '%' . $keyword . '%');
    //     }

    //     if (!empty($countries)) {
    //         $query->whereIn('campus_country', $countries);
    //     }
       
    //     $query->orderBy('id','desc');
    //     $programs = $query->paginate(9)->withQueryString();

    //     return view('search', compact('programs'));
    // }

        public function search(Request $request)
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

            return view('search', compact('programs','schools'));
        }



    // Show the form for creating a new program
    public function create()
    {
       $country= Country::all();
        return view('discover_program.create', compact('country'));
    }

    // Store a newly created program
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'university_name' => 'required|string|max:255',
            'certificate' => 'required|string|max:255',
            'college_name' => 'required|string|max:255',
            'college_course' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'campus_country' => 'required|string|max:255',
            'campus_city' => 'required|string|max:255',
            'tuition' => 'required|numeric',
            'application_fee' => 'required|numeric',
            'duration' => 'required|string',
            'success_prediction' => 'required|string',
            'details' => 'required|string',
            'program_level' => 'required|string',
            'language' => 'required|string',
            // 'status' => 'required|string|in:Active,Inactive',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('program_thumbs', 'public');
        }

        // Create the program
        $program = new Program();
        $program->university_name = $validated['university_name'];
        $program->certificate = $validated['certificate'];
        $program->college_name = $validated['college_name'];
        $program->college_course = $validated['college_course'];
        $program->location = $validated['location'];
        $program->campus_country = $validated['campus_country'];
        $program->campus_city = $validated['campus_city'];
        $program->tuition = $validated['tuition'];
        $program->application_fee = $validated['application_fee'];
        $program->duration = $validated['duration'];
        $program->success_prediction = $validated['success_prediction'];
        $program->details = $validated['details'];
        $program->program_level = $validated['program_level'];
        $program->language = $validated['language'];

        // Store the image path
        if ($imagePath) {
            $program->image = $imagePath;
        }

        $program->save();

        return redirect()->route('discover_program.index')->with('success', 'Program created successfully.');
    }

    // Show a single program as JSON
    public function show($id)
    {
        $program = Program::findOrFail($id);
         $country= Country::all();
        return response()->json($program);
    }

    // Show the form for editing a program
    public function edit($id)
    {
         $country= Country::all();
        $program = Program::findOrFail($id);
        return view('discover_program.edit', compact('program','country'));
    }

    // Update a specific program
    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        try {
            // Update all fields except image
            $program->update($request->except('image'));

            // Handle image update
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($program->image && Storage::disk('public')->exists($program->image)) {
                    Storage::disk('public')->delete($program->image);
                }

                // Store new image
                $imagePath = $request->file('image')->store('program_thumbs', 'public');
                $program->image = $imagePath;
                $program->save();
            }

            return redirect()->route('discover_program.index')->with('success', 'Program updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('discover_program.index')->with('error', 'Failed to update program. Please try again.');
        }
    }



    // Delete a program
    public function destroy($id)
    {
        $program = Program::findOrFail($id);

        // Delete the image if it exists
        if ($program->image) {
            Storage::disk('public')->delete($program->image);
        }

        $program->delete();

        return redirect()->route('discover_program.index')->with('success', 'Program deleted successfully!');
    }

    // Toggle status
    // public function toggleStatus($id)
    // {
    //     $program = Program::findOrFail($id);
    //     $program->status = ($program->status === 'Active') ? 'Inactive' : 'Active';
    //     $program->save();

    //     return response()->json(['status' => $program->status]);
    // }

     public function changeLanguage($locale)
    {
        if (!in_array($locale, ['en', 'fr'])) {
            abort(400);
        }

        Session::put('locale', $locale);
        App::setLocale($locale);

        return Redirect::back(); // or redirect()->route('home')
    }

    public function myApplicationStore(Request $request)
{
    $request->validate([
        'program_id' => 'required|string',
        'payment_status' => 'required|in:Complete,Pending,Cancel',
    ]);

    MyApplication::create([
        'user_id' => auth()->id(),
        'program_id' => $request->program_id,
        'payment_status' => $request->payment_status,
        'status' => 'active',
    ]);

    return redirect()->route('usersearchProgram')->with('success', 'Application submitted successfully!');

    // return redirect()->back()->with('success', 'Application submitted successfully!');
}

public function showDetails($id)
{
    $program = Program::findOrFail($id);

    $relatedPrograms = Program::where('id', '!=', $id)
        ->where(function ($query) use ($program) {
            $query->where('program_level', $program->program_level)
                  ->orWhere('college_course', $program->college_course)
                  ->orWhere('campus_country', $program->campus_country);
        })
        ->take(6)
        ->get();

    return view('programdetails', compact('program', 'relatedPrograms'));
}


  
}
