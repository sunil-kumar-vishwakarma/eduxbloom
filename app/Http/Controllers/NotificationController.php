<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return view('admin.notifications', compact('notifications'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'audience' => 'required|string',
            'date' => 'required|date',
        ]);

        Notification::create($validated);

        return redirect()->route('notifications')->with('success', 'Notification created successfully!');
    }
}

