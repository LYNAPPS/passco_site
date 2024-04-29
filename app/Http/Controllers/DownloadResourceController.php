<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DownloadResourceController extends Controller
{
    public function savePhoneNumber(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_phone_number' => ['required', 'regex:/^(\+\d{1,3}[- ]?)?\d{10}$/'],
        ], [
            'student_phone_number.required' => 'The phone number field is required.',
            'student_phone_number.regex' => 'Please enter your phone number in the format +1234567890, 123-456-7890, or 0240000000.',
        ]);

        $validator->sometimes('student_phone_number', 'size:10', function ($input) {
            return strlen($input->student_phone_number) < 10;
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Convert phone number to local format
        $phoneNumber = $request->input('student_phone_number');
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        $phoneNumber = Str::startsWith($phoneNumber, '+123') ? substr($phoneNumber, 4) : $phoneNumber;
        $phoneNumber = str_replace(['-', ' '], '', $phoneNumber);

        $existingStudent = Student::where('phone_number', $phoneNumber)->first();
        if ($existingStudent) {
        } else {
            $student = new Student();
            $student->phone_number = $phoneNumber;
            $student->save();
        }

        dd($phoneNumber);


        // If validation passes, continue with your logic...
    }
}
