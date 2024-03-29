<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminSubjectsController extends Controller
{
    public function index()
    {
    }
    public function create()
    {
        $levels = Level::all();
        return view('subject.create', compact('levels'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
        ]);
        $data = $request->except(['_token']);

        Subject::create($data);

        return redirect()->back()->with('success', 'Subject created successfully.');
    }

    public function edit(Subject $subject)
    {
        $levels = Level::all();
        return view('subject.edit', compact('subject', 'levels'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
