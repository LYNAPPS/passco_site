<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

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

    public function classes()
    {
    }
    public function subjects()
    {
    }
}
