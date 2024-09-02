@extends('layouts.header')

@section('main-content')
<div class="container">
    <h1>Entrollment Details</h1>

    <div class="card">
        <div class="card-header">
            Entrollment #{{ $entrollment->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Entrollment Number: {{ $entrollment->entroll_no }}</h5>
            <p class="card-text">Batch ID: {{ $entrollment->batch_id }}</p>
            <p class="card-text">Student ID: {{ $entrollment->student_id }}</p>
            <p class="card-text">Join Date: {{ $entrollment->join_date }}</p>
            <p class="card-text">Fee: LKR{{ $entrollment->fee }}</p>
            <a href="{{ route('entrollments.index') }}" class="btn btn-primary">Back to List</a>

        </div>
    </div>
</div>
@endsection
