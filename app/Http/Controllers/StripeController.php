<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\MyApplication;

class StripeController extends Controller
{
    //

    // public function createSession($applicationId)
    // {
    //     // $application = MyApplication::findOrFail($applicationId);

    //     $application = MyApplication::with('program')
    // ->where('program_id', $applicationId)
    // ->where('user_id', auth()->id()) // Optional: ensure current user's application
    // ->first();
    //     Stripe::setApiKey(config('services.stripe.secret'));

    //     $session = Session::create([
    //         'payment_method_types' => ['card'],
    //         'line_items' => [[
    //             'price_data' => [
    //                 'currency' => 'usd',
    //                 'product_data' => [
    //                     'name' => $application->program->college_course,
    //                 ],
    //                 'unit_amount' => $application->program->application_fee, // in cents => $10.00
    //             ],
    //             'quantity' => 1,
    //         ]],
    //         'mode' => 'payment',
    //         'success_url' => route('payment.success', $application->program->id),
    //         'cancel_url' => url()->previous(),
    //     ]);

    //     return response()->json(['id' => $session->id]);
    // }


public function createSession($id)
{
    $application = MyApplication::with('program')->findOrFail($id);

    Stripe::setApiKey(config('services.stripe.secret'));

    $session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => $application->program->college_course ?? 'Application Fee',
                ],
                'unit_amount' => intval($application->program->application_fee * 100),
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('payment.success', $application->id),
        'cancel_url' => url()->previous(),
    ]);
    // print_r($session);die;
    return response()->json(['id' => $session->id]);
}


    public function paymentSuccess($id)
{
    $application = MyApplication::findOrFail($id);
    $application->update(['payment_status' => 'Paid']);

    return redirect()->route('user_myapplication')->with('success', 'Payment successful!');
}


}
