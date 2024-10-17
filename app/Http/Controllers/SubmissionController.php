<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function store(Request $request, $id) {
        $data = $request->validate([
            'file' => 'required|file',
        ]);
        $path = $request->file('file')->store('submissions');
        Submission::create([
            'assignment_id' => $id,
            'student_id' => auth()->id(),
            'file_path' => $path,
        ]);
        return redirect()->route('assignments.index');
    }
}

