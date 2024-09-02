@extends('layouts.header')

@section('main-content')
<div class="container">
    <h1>Payments</h1>
    <a href="{{ route('payments.create') }}" class="btn btn-primary">Create New Payment</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Enrollment No</th>
                <th>Paid Date</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->enrollment->entroll_no }}</td> <!-- Accessing entroll_no via the relationship -->
                    <td>{{ $payment->paid_date }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>
                        <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('payments.report', $payment->id) }}" class="btn btn-success">Generate Report</a>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline-block;">
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
