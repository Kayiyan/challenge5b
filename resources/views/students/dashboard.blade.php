@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome, {{ auth()->user()->name }}!</h1>
    <h3>Your Assignments</h3>
    <!-- List of assignments with download and upload options -->
    @foreach ($assignments as $assignment)
        <div>
            <h4>{{ $assignment->title }}</h4>
            <p>{{ $assignment->description }}</p>
            <a href="{{ route('assignments.download', $assignment->id) }}">Download Assignment</a>
            
            <form action="{{ route('assignments.submit', $assignment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="submission">
                <button type="submit">Submit Assignment</button>
            </form>
        </div>
    @endforeach

    <h3>Your Challenges</h3>
    <!-- List of challenges -->
    @foreach ($challenges as $challenge)
        <div>
            <h4>{{ $challenge->hint }}</h4>
            <form action="{{ route('challenges.submit', $challenge->id) }}" method="POST">
                @csrf
                <input type="text" name="answer" placeholder="Your answer">
                <button type="submit">Submit</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
