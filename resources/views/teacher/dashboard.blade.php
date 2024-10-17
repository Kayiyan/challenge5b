@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome, {{ auth()->user()->name }}!</h1>
    <h3>Manage Assignments</h3>
    <form action="{{ route('assignments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Assignment Title">
        <textarea name="description" placeholder="Assignment Description"></textarea>
        <input type="file" name="file">
        <button type="submit">Upload Assignment</button>
    </form>

    <h3>Manage Challenges</h3>
    <form action="{{ route('challenges.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="hint" placeholder="Challenge Hint">
        <input type="file" name="file">
        <button type="submit">Create Challenge</button>
    </form>

    <h3>Student Submissions</h3>
    <!-- List of student submissions -->
    @foreach ($submissions as $submission)
        <div>
            <h4>{{ $submission->student->name }}</h4>
            <p>Submitted on {{ $submission->created_at }}</p>
            <a href="{{ route('submissions.download', $submission->id) }}">Download Submission</a>
        </div>
    @endforeach
</div>
@endsection
