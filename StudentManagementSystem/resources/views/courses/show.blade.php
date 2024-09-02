@extends('layouts.header')

@section('main-content')
<div class="container">
    <h2>Course Details</h2>
    <p><strong>ID:</strong> {{ $course->id }}</p>
    <p><strong>Name:</strong> {{ $course->name }}</p>
    <p><strong>Syllabus:</strong> {{ $course->syllabus }}</p>
    <p><strong>Duration:</strong> {{ $course->duration }}</p>
    <a href="{{ route('courses.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection
