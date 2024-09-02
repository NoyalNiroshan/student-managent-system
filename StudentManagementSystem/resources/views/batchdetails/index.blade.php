@extends('layouts.header')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Batches List</h2>

            <a href="{{ route('batchdetails.create') }}" class="btn btn-primary mb-3">Add Batch</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Start Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($batches as $batch)
                        <tr>
                            <td>{{ $batch->id }}</td>
                            <td>{{ $batch->name }}</td>
                            <td>{{ $batch->course->name }}</td>
                            <td>{{ $batch->start_date }}</td>
                            <td>
                                <a href="{{ route('batchdetails.show', $batch->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('batchdetails.edit', $batch->id) }}" class="btn btn-primary">Edit</a>

                                <form action="{{ route('batchdetails.destroy', $batch->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this batch?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
