<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ExaminationTypeController extends Controller
{
    public function create()
    {
        return view('exams.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Validation passed, save the record
        $examType = new ExamType();
        $examType->name = $request->name;
        $examType->slug = Str::slug($request->name);
        $examType->short_name = $request->short_name;
        $examType->save();

        return redirect()->route('exams.index')->with('success', 'Exam type created successfully.');
    }

    public function edit(ExamType $examType)
    {
        return view('exams.edit', compact('examType'));
    }

    public function update(Request $request, ExamType $examType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:50',
        ]);

        $examType->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'short_name' => $request->short_name,
        ]);

        return redirect()->route('exams.index')->with('success', 'Exam type updated successfully.');
    }

    public function destroy(ExamType $examType)
    {
        $examType->delete();

        return redirect()->route('exams.index')->with('success', 'Exam type deleted successfully.');
    }
}
