<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    // Display a list of subscriptions
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('admin.subscriptions', compact('subscriptions'));
    }

    // Show the details of a specific subscription
  public function show($id)
{
    $subscription = Subscription::find($id);
    if (!$subscription) {
        return response()->json(['error' => 'Subscription not found'], 404);
    }
    return response()->json(['subscription' => $subscription]);
}




    // Delete a subscription
   public function destroy($id)
{
    $subscription = Subscription::findOrFail($id);
    $subscription->delete();

    return redirect()->route('subscriptions.index')->with('success', 'Subscription deleted successfully.');
}



    // Update the status of a subscription
   public function updateStatus($id, Request $request)
{
    $subscription = Subscription::findOrFail($id);
    $newStatus = $request->status;
    $subscription->status = $newStatus;
    $subscription->save();

    return response()->json(['success' => true]);
}


}
