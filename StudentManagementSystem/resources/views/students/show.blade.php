@extends('layouts.header')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Student Details</h2>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $student->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $student->phone }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $student->address }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $student->email }}</td>
                </tr>
            </table>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
