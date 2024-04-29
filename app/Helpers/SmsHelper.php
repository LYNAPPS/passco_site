<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class SmsHelper
{
    public static function sendSms()
    {
        $messageData = [
            'username' => 'johnny',
            'password' => 'Johnny@doe2000',
            'senderid' => 'PASCO',
            'message' => 'Hello World',
            'service' => 'SMS',
            'smstype' => 'text',
            'subject' => 'Message Subject',
            'destinations' => [
                [
                    'destination' => '0244086787',
                    'msgid' => 101
                ]
            ]
        ];

        $response = Http::post('https://frog.wigal.com.gh/api/v2/sendmsg', $messageData);

        if ($response->successful()) {
            $responseData = $response->json();

            if ($responseData['status'] === 'ACCEPTED') {
                return response()->json(['message' => 'Message accepted for sending']);
            } else {
                return response()->json(['error' => 'Message could not be sent'], 400);
            }
        } else {
            return response()->json(['error' => 'Failed to send message'], 500);
        }
    }
}
