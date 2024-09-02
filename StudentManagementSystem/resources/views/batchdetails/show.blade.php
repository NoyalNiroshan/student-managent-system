@extends('layouts.header')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Batch Details</h2>

            <div class="form-group">
                <label for="name">Name:</label>
                <p>{{ $batch->name }}</p>
            </div>
            <div class="form-group">
                <label for="course">Course:</label>
                <p>{{ $batch->course ? $batch->course->name : 'Course not available' }}</p>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <p>{{ $batch->start_date }}</p>
            </div>
            <a href="{{ route('batchdetails.index') }}" class="btn btn-secondary mt-3">Back to List</a>
        </div>
    </div>
</div>
@endsection
