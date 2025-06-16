<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    public function index()
    {
        $webinars = Webinar::all();
        return view('webinars.index', compact('webinars'));
    }

    public function create()
    {
        return view('webinars.create');
    }

  public function store(Request $request)
{
    $validated = $request->validate([
        'type' => 'required|string',
        'title' => 'required|string',
        'date' => 'required|string',
        'time' => 'required|string',
    ]);

    Webinar::create($validated);

    return redirect()->route('webinars.index')->with('success', 'Webinar created successfully.');
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'type' => 'required|string',
        'title' => 'required|string',
        'date' => 'required|string',
        'time' => 'required|string',
    ]);

    Webinar::findOrFail($id)->update($validated);

    return redirect()->route('webinars.index')->with('success', 'Webinar updated successfully.');
}


     public function edit($id)
    {
        $webinar = Webinar::findOrFail($id);
        return view('webinars.edit', compact('webinar'));
    }
    public function destroy($id)
    {
        Webinar::findOrFail($id)->delete();
        return back()->with('success', 'Webinar deleted.');
    }

    public function showWebinars()
{
    $webinars = Webinar::all();
    return view('webinar', compact('webinars'));
}
}
