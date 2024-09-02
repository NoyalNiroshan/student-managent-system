@extends('layouts.header')

@section('main-content')
<div class="container">
    <h1>Entrollments</h1>
    <a href="{{ route('entrollments.create') }}" class="btn btn-primary mb-3">Add New Entrollment</a>
    @if($entrollments->isEmpty())
        <p>No entrollments available.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Entrollment Number</th>
                    <th>Batch ID</th>
                    <th>Student ID</th>
                    <th>Join Date</th>
                    <th>Fee</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entrollments as $entrollment)
                <tr>
                    <td>{{ $entrollment->id }}</td>
                    <td>{{ $entrollment->entroll_no }}</td>
                    <td>{{ $entrollment->batch->name }}</td>
                    <td>{{ $entrollment->student->name }}</td>
                    <td>{{ $entrollment->join_date }}</td>
                    <td>{{ $entrollment->fee }}</td>
                    <td>
                        <a href="{{ route('entrollments.show', $entrollment->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('entrollments.edit', $entrollment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('entrollments.destroy', $entrollment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
