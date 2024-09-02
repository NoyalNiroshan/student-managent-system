@extends('layouts.header')

@section('main-content')
<div class="container">
    <h1>Create New Enrollment</h1>

    <form action="{{ route('entrollments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="entroll_no">Enrollment Number</label>
            <input type="text" class="form-control" id="entroll_no" name="entroll_no" required>
        </div>

        <div class="form-group">
            <label for="batch_id">Batch</label>
            <select class="form-control" id="batch_id" name="batch_id" required
                    style="color: black; background-color: white; font-size: 16px; border: 1px solid black;">
                <option value="" disabled selected>Select a Batch</option>
                @foreach($batches as $batch)
                    <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="student_id">Student</label>
            <select class="form-control" id="student_id" name="student_id" required
                    style="color: black; background-color: white; font-size: 16px; border: 1px solid black;">
                <option value="" disabled selected>Select a Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="join_date">Join Date</label>
            <input type="date" class="form-control" id="join_date" name="join_date" required>
        </div>

        <div class="form-group">
            <label for="fee">Fee</label>
            <input type="number" class="form-control" id="fee" name="fee" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('entrollments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
