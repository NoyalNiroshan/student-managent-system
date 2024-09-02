@extends('layouts.header')

@section('main-content')
<div class="container">
    <h1>Edit Entrollment</h1>

    <form action="{{ route('entrollments.update', $entrollment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="entroll_no">Entrollment Number</label>
            <input type="text" class="form-control" id="entroll_no" name="entroll_no" value="{{ $entrollment->entroll_no }}" required>
        </div>
        <div class="form-group">
            <label for="batch_id">Batch</label>
            <select class="form-control" id="batch_id" name="batch_id" required>
                @foreach($batches as $batch)
                    <option value="{{ $batch->id }}" {{ $entrollment->batch_id == $batch->id ? 'selected' : '' }}>
                        {{ $batch->batch_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="student_id">Student</label>
            <select class="form-control" id="student_id" name="student_id" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $entrollment->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="join_date">Join Date</label>
            <input type="date" class="form-control" id="join_date" name="join_date" value="{{ $entrollment->join_date }}" required>
        </div>
        <div class="form-group">
            <label for="fee">Fee</label>
            <input type="number" class="form-control" id="fee" name="fee" step="0.01" value="{{ $entrollment->fee }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('entrollments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
