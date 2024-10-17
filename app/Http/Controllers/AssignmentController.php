<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index() {
        $assignments = Assignment::all();
        return view('assignments.index', compact('assignments'));
    }

    public function create() {
        return view('assignments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|file',
        ]);
    
        $path = $request->file('file')->store('assignments');
    
        Assignment::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $path,
            'teacher_id' => auth()->id(),
        ]);
    
        return redirect()->route('teacher.dashboard')->with('success', 'Assignment uploaded successfully!');
    }
    

    public function show($id) {
        $assignment = Assignment::findOrFail($id);
        return view('assignments.show', compact('assignment'));
    }
}

