<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SMSController extends Controller
{
    public function sendOTP(Request $request)
    {
        // Get the phone number from the request
        $phoneNumber = $request->input('phone_number');

        // Validate phone number (must be in international format)
        if (!preg_match('/^\+?[1-9]\d{1,14}$/', $phoneNumber)) {
            return response()->json(['error' => 'Invalid phone number format'], 400);
        }

        // Generate a random 6-digit OTP
        $otp = rand(100000, 999999);

        // Prepare the API request parameters
        $apiKey = env('MSG91_API_KEY');
        $senderId = env('MSG91_SENDER_ID');
        $route = env('MSG91_ROUTE');
        $message = "Your OTP code is: $otp"; // OTP message

        $client = new Client();
        $url = "https://api.msg91.com/api/v5/otp?authkey=$apiKey&sender=$senderId&route=$route&mobile=$phoneNumber&otp=$otp";

        try {
         
            // Send the OTP via the M   SG91 API
            $response = $client->post($url);


            // Check if the response is successful
            if ($response->getStatusCode() == 200) {
                return response()->json(['message' => 'OTP sent successfully']);
            } else {
                return response()->json(['error' => 'Failed to send OTP'], 500);
            }
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
