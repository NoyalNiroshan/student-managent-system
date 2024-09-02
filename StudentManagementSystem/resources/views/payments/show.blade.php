@extends('layouts.header')

@section('main-content')
<div class="container">
    <h1>Payment Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Payment ID: {{ $payment->id }}</h5>
            <p class="card-text"><strong>Enrollment ID:</strong> {{ $payment->enrollment->entroll_no }}</p>
            <p class="card-text"><strong>Paid Date:</strong> {{ $payment->paid_date }}</p>
            <p class="card-text"><strong>Amount paid:</strong> {{ $payment->amount }}</p>

            <p><strong>Due Amount:</strong> {{ $dueAmount }}</p>
            <a href="{{ route('payments.index') }}" class="btn btn-primary">Back to Payments</a>
        </div>
    </div>
</div>
@endsection
