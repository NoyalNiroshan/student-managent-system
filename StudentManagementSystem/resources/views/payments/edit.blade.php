@extends('layouts.header')

@section('main-content')
<div class="container">
    <h1>Edit Payment</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Enrollment Dropdown -->
        <div class="form-group">
            <label for="entrollment_id">Enrollment No</label>
            <select name="entrollment_id" id="entrollment_id" class="form-control">
                <option value="">Select Enrollment</option>
                @foreach($enrollments as $enrollment)
                    <option value="{{ $enrollment->id }}" {{ $enrollment->id == $payment->entrollment_id ? 'selected' : '' }}>
                        {{ $enrollment->entroll_no }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="paid_date">Paid Date</label>
            <input type="date" name="paid_date" class="form-control" value="{{ old('paid_date', $payment->paid_date) }}">
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" value="{{ old('amount', $payment->amount) }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Payment</button>
    </form>
</div>
@endsection
