<?php

namespace App\Services;

use GuzzleHttp\Client;

class Msg91Service
{
    protected $client;
    protected $apiKey;
    protected $sender;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('MSG91_API_KEY');
        $this->sender = env('MSG91_SENDER_ID', 'EDUXAD'); 
    }

    public function sendSMS($mobile, $message)
    {
        try {
            $payload = [
                'sender' => $this->sender,
                'route' => '4',
                'country' => '91',
                'message' => $message,
                'to' => [$mobile]
            ];
    
            \Log::info('Sending SMS to MSG91', ['payload' => $payload]);
    
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'timeout' => 10, // timeout after 10 seconds
            ]);
            
    
            return ['msg91_response' => $response->getBody()->getContents()];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => 'Failed to send SMS.',
                'exception' => $e->getMessage()
            ];
        }
    }
    
    
}
