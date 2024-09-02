@extends('layouts.header')

@section('main-content')
<div class="container">
    <h1>Create Payment</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('payments.store') }}" method="POST">
        @csrf

        <!-- Enrollment Dropdown -->
        <div class="form-group">
            <label for="entrollment_id">Enrollment</label>
            <select name="entrollment_id" id="entrollment_id" class="form-control">
                <option value="">Select Enrollment</option>
                @foreach($entrollments as $entrollment)
                    <option value="{{ $entrollment->id }}">{{ $entrollment->entroll_no }}</option> <!-- Adjust 'name' to the appropriate column -->
                @endforeach
            </select>
        </div>

        <!-- Paid Date Input -->
        <div class="form-group">
            <label for="paid_date">Paid Date</label>
            <input type="date" name="paid_date" id="paid_date" class="form-control" value="{{ old('paid_date') }}">
        </div>

        <!-- Amount Input -->
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" id="amount" class="form-control" value="{{ old('amount') }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create Payment</button>
    </form>
</div>
@endsection
