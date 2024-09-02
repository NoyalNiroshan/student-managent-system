@extends('layouts.header')

@section('main-content')
<div class="container">
    <h2>Edit Course</h2>
    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}" required>
        </div>
        <div class="mb-3">
            <label for="syllabus" class="form-label">Syllabus</label>
            <input type="text" class="form-control" id="syllabus" name="syllabus" value="{{ $course->syllabus }}" required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" value="{{ $course->duration }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Course</button>
    </form>
</div>
@endsection
