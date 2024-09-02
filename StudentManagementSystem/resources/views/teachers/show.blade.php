@extends('layouts.header')

@section('main-content')
<div class="container">
    <h2>Teacher Details</h2>
    <p><strong>ID:</strong> {{ $teacher->id }}</p>
    <p><strong>Name:</strong> {{ $teacher->name }}</p>
    <p><strong>Phone:</strong> {{ $teacher->phone }}</p>
    <p><strong>Email:</strong> {{ $teacher->email }}</p>
    <p><strong>Address:</strong> {{ $teacher->address }}</p>
    <a href="{{ route('teachers.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection
