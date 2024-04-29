<?php

namespace App\Http\Controllers;

use App\Helpers\NormalizePhoneNumber;
use App\Helpers\SmsHelper;
use App\Models\Student;
use App\Models\StudentResource;
use App\Services\StudentResourceRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DownloadResourceController extends Controller
{
    public function savePhoneNumber(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_phone_number' => ['required', 'regex:/^(\+\d{1,3}[- ]?)?\d{10}$/'],
            'resourceID' => 'required'
        ], [
            'student_phone_number.required' => 'The phone number field is required.',
            'student_phone_number.regex' => 'Please enter your phone number in the format +1234567890, 123-456-7890, or 0240000000.',
        ]);

        // Apply additional validation if the phone number length is less than 10
        $validator->sometimes('student_phone_number', 'size:10', function ($input) {
            return strlen($input->student_phone_number) < 10;
        });

        // Redirect back with errors if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $phoneNumber = NormalizePhoneNumber::normalizePhoneNumber($request->input('student_phone_number'));

        // Check if the student exists
        $student = Student::where('phone_number', $phoneNumber)->first();
        if ($student) {

            return redirect()->route('preview.download', $student->id);
        }

        $newStudent =  (new StudentResourceRequest)->stageOne($request, $phoneNumber);

        $student = $newStudent['student'];
        $studentResource = $newStudent['studentResource'];

        // Redirect to the route with both IDs
        return redirect()->route('submit.details', ['student' => $student->id, 'token' => $studentResource->download_token]);
        // $newStudent =  (new StudentResourceRequest)->storeStudentDetails($request, $student, $phoneNumber);
    }

    public function saveStudentDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'resource_id' => 'required',
            'student_name' => 'required|string|max:255',
            'student_level' => 'required|integer|between:1,3',
        ], [
            'student_name.required' => 'Please enter your full name.',
            'student_name.string' => 'Your full name must be a string.',
            'student_name.max' => 'Your full name must not exceed 255 characters.',
            'student_level.required' => 'Please select your level.',
            'student_level.integer' => 'Your level must be an integer.',
            'student_level.between' => 'Please select a valid level.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $newStudent =  (new StudentResourceRequest)->storeStudentDetails($request);


        return redirect()->route('preview.download', ['student' => $request->student_id, 'token' => $request->resource_id]);
    }

    public function smsRequestSent(Request $request)
    {
        // SmsHelper::sendSms();
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

        // dd($request);
    }
}
