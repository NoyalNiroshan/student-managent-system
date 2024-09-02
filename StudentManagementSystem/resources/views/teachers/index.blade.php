@extends('layouts.header')

@section('main-content')
<div class="container">
    <h2>Teachers List</h2>
    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add Teacher</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td>
                        <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this teacher?');">
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
@endsection
