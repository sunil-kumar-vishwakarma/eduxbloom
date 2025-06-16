<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::first(); // Get the settings record
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        try {
            $settings = Setting::firstOrNew([]); // Get or create a settings record

            // Update fields
            $settings->site_title = $request->input('site_title');
            $settings->admin_email = $request->input('admin_email');
            $settings->user_permissions = $request->input('user_permissions');
            $settings->enable_notifications = $request->boolean('enable_notifications');
            $settings->notification_template = $request->input('notification_template');
            $settings->payment_gateway = $request->input('payment_gateway');
            $settings->api_key = $request->input('api_key');
            $settings->subscription_price = $request->input('subscription_price');

            // Handle logo upload
            if ($request->hasFile('logo')) {
                $settings->logo = $request->file('logo')->store('logos', 'public');
            }

            // Handle favicon upload
            if ($request->hasFile('favicon')) {
                $settings->favicon = $request->file('favicon')->store('favicons', 'public');
            }

            $settings->save();

            // Return success message with a view
            return redirect()->route('settings.index')->with('success', 'Settings saved successfully!');
        } catch (\Exception $e) {
            // Return error message with a view
            return redirect()->route('settings.index')->with('error', 'Failed to save settings: ' . $e->getMessage());
        }
    }
}
