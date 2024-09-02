@extends('layouts.header')

@section('main-content')
<div class="container">
    <h2>Add Course</h2>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="syllabus" class="form-label">Syllabus</label>
            <input type="text" class="form-control" id="syllabus" name="syllabus" required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" required>
        </div>
        <button type="submit" class="btn btn-success">Add Course</button>
    </form>
</div>
@endsection
