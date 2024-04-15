<?php

namespace App\Http\Controllers;

use App\Models\ExamType;
use App\Models\Subject;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        return view('resources.index');
    }

    public function create()
    {
        $exams = ExamType::all();
        $subjects = Subject::all();
        return view('resources.create', compact('exams', 'subjects'));
    }
}
