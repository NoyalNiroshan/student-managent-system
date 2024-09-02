<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Entrollment; // Correct namespace for Entrollment
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PaymentController extends Controller
{

    public function index()
    {
        // Retrieve all payments and return them as a response
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all entrollments
        $entrollments = Entrollment::all();

        // Pass the entrollments data to the view
        return view('payments.create', compact('entrollments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'entrollment_id' => 'required|exists:entrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        // Create a new payment
        Payment::create($validated);

        // Redirect back with success message
        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        $enrollment = $payment->enrollment;

        // Calculate due amount
        $dueAmount = $enrollment->fee - $payment->amount;

        // Debugging output
        // dd($enrollment->fee, $payment->amount, $dueAmount);

        return view('payments.show', compact('payment', 'enrollment', 'dueAmount'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    // Retrieve the payment by ID
    $payment = Payment::findOrFail($id);

    // Retrieve all enrollments for the dropdown
    $enrollments = Entrollment::all();

    // Pass the payment and enrollments to the view
    return view('payments.edit', compact('payment', 'enrollments'));
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $validated = $request->validate([
            'entrollment_id' => 'required|exists:entrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        // Find the payment and update it
        $payment = Payment::findOrFail($id);
        $payment->update($validated);

        // Redirect back with success message
        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the payment and delete it
        $payment = Payment::findOrFail($id);
        $payment->delete();

        // Redirect back with success message
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }

    public function generateReport(string $id)
{
    // Retrieve the payment by ID
    $payment = Payment::findOrFail($id);

    // Retrieve the related enrollment, student, course, and batch details
    $entrollment = Entrollment::with(['student', 'course', 'batch'])->findOrFail($payment->entrollment_id);

    // Calculate the due amount (if applicable)
    $dueAmount = $entrollment->fee - $payment->amount;

    // Return the report view with all the required data
    return view('payments.report', compact('payment', 'entrollment', 'dueAmount'));
}


}
