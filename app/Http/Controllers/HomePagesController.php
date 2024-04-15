<?php

namespace App\Http\Controllers;

use App\Models\ExamType;
use Illuminate\Http\Request;

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
        return view('frontend.libraries', compact('exams'));
    }
}
