<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\Level;
use App\Models\Subject;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class AdminPagesController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function examsTypes()
    {
        $examsTypes = ExamType::all();
        return view('exams.index', compact('examsTypes'));
    }

    public function levels()
    {
        $levels = Level::all();
        return view('level.index', compact('levels'));
    }
    public function subjects()
    {
        $subjects = Subject::all();
        return view('subject.index', compact('subjects'));
    }
}
