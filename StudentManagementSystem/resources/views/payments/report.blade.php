@extends('layouts.header')

@section('main-content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Payment Report</h1>

    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
        <h2 class="text-2xl font-semibold mb-4">Enrollment Details</h2>
        <div class="space-y-2">
            <p><strong class="font-medium">Enrollment ID:</strong> {{ $entrollment->id }}</p>
            <p><strong class="font-medium">Student Name:</strong> {{ $entrollment->student->name }}</p>
            <p><strong class="font-medium">Course:</strong>
                @if($entrollment->course)
                    {{ $entrollment->course->name }}
                @else
                    Not Assigned
                @endif
            </p>
            <p><strong class="font-medium">Batch:</strong> {{ $entrollment->batch->name }}</p>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Payment Details</h2>
        <div class="space-y-2">
            <p><strong class="font-medium">Paid Date:</strong> {{ $payment->paid_date }}</p>
            <p><strong class="font-medium">Amount Paid:</strong> LKR{{ number_format($payment->amount, 2) }}</p>
            <p><strong class="font-medium">Due Amount:</strong> LKR{{ number_format($dueAmount, 2) }}</p>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back to Payments</a>
        <button onclick="window.print()" class="btn btn-primary">Print Report</button>
       
    </div>

</div>
@endsection



