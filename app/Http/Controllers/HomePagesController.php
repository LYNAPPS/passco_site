<?php

namespace App\Http\Controllers;

use App\Models\ExamType;
use App\Models\Resource;
use App\Models\Student;
use App\Models\StudentResource;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomePagesController extends Controller
{
    public function index()
    {
        $exams = ExamType::all();
        return view('welcome', compact('exams'));
    }

    public function libraries()
    {
        $exams = ExamType::all();
        $subjects = Subject::with('examType')->take(8)->get();


        return view('frontend.libraries', compact('exams', 'subjects'));
    }

    public function viewExamLibrary($slug, $id)
    {
        $exam = ExamType::findOrFail($id);

        if ($exam->slug !== $slug) {
            abort(404);
        }

        $subjects = $exam->subjects;

        return view('frontend.view-library', compact('exam', 'subjects'));
    }


    public function viewSubjectPasco($slug, $id)
    {
        $subject = Subject::findOrFail($id);

        if ($subject->slug !== $slug) {
            abort(404);
        }

        $resources = $subject->resource;

        return view('frontend.view-pasco', compact('resources', 'subject'));
    }

    public function allSubjects()
    {
        return view('frontend.all-subjects');
    }

    public function fetchContent($examType)
    {

        $examType = ExamType::findOrFail($examType);
        $subjects = $examType->subjects()->get();


        $html = view('partials.subjects', ['subjects' => $subjects])->render();

        return response()->json(['html' => $html]);
    }

    public function fetchAllSubjects()
    {
        // Fetch all subjects
        $subjects = Subject::all();

        $html = view('partials.subjects', ['subjects' => $subjects])->render();

        // Return subjects as JSON response
        return response()->json(['html' => $html]);
    }

    public function submitNumber(Resource $resource)
    {
        $resourceID = $resource->id;
        return view('frontend.submit-number', compact('resourceID'));
    }

    public function submitOtherDetails(Student $student, $token)
    {
        $studentID = $student->id;
        return view('frontend.submit-details', compact('studentID', 'token'));
    }

    public function downloadPreview(Student $student, $token)
    {
        // $resource = StudentResource::findOrFail($token);
        $resource = StudentResource::where('download_token', $token)->first();
        $relatedResource = $resource->resource;
        // dd($relatedResource);
        $relatedStudent = $resource->student;

        return view('frontend.confirm-download', compact('resource', 'relatedResource', 'relatedStudent'));
    }
}
