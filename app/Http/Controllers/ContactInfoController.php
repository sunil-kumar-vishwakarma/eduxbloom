<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contacts = ContactInfo::all();
        return view('contact_infos.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact_infos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon_class' => 'required|string',
            'title' => 'required|string',
            // 'subtitle' => 'nullable|string',
            'link' => 'nullable|string',
            'link_text' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        ContactInfo::create($request->all());

        return redirect()->route('contact-infos.index')->with('success', 'Contact info added successfully.');
    }

    public function edit(ContactInfo $contact_info)
    {
        return view('contact_infos.edit', compact('contact_info'));
    }

    public function update(Request $request, ContactInfo $contact_info)
    {
        $request->validate([
            'icon_class' => 'required|string',
            'title' => 'required|string',
            // 'subtitle' => 'nullable|string',
            'link' => 'nullable|string',
            'link_text' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $contact_info->update($request->all());

        return redirect()->route('contact-infos.index')->with('success', 'Contact info updated successfully.');
    }

    // public function destroy(ContactInfo $contact_info)
    // {
    //     $contact_info->delete();
    //     return redirect()->route('contact-infos.index')->with('success', 'Contact info deleted successfully.');
    // }
     public function destroy($id)
    {
        ContactInfo::findOrFail($id)->delete();
        return back()->with('success', 'Contact info deleted successfully.');
    }
}
