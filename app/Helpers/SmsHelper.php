<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsHelper
{
    public static function sendSms($student, $customMessage)
    {
        $messageData = [
            'username' => 'johnny',
            'password' => 'Johnny@doe2000',
            'senderid' => 'PASCO',
            'message' => $customMessage,
            'service' => 'SMS',
            'smstype' => 'text',
            'subject' => 'Message Subject',
            'destinations' => [
                [
                    'destination' => $student->phone_number,
                    'msgid' => 101
                ]
            ]
        ];

        try {
            $response = Http::withHeaders([
                "Content-Type" => "application/json"
            ])->post("https://frog.wigal.com.gh/api/v2/sendmsg", $messageData);

            if ($response->successful()) {
                $responseBody = $response->json();
                dd($responseBody);
                if ($responseBody['status'] === 'ACCEPTED') {
                    return response()->json(['message' => 'Message accepted for sending']);
                } else {
                    return response()->json(['error' => 'Message could not be sent'], 400);
                }
            } else {
                return response()->json(['error' => 'Failed to send message'], 500);
            }
        } catch (Exception $e) {
            Log::error("Error: " . $e->getMessage());
        }
    }
}
