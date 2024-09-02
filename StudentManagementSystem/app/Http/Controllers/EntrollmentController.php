<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Student;
use App\Models\Course;
use App\Models\Entrollment;




class EntrollmentController extends Controller
{
    public function index()
    {
        $entrollments = Entrollment::all();
        return view('entrollments.index', compact('entrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $batches = Batch::all();
        
        return view('entrollments.create', compact('students', 'batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'entroll_no' => 'required|string',
            'batch_id' => 'required|exists:batchs,id',
            'student_id' => 'required|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric',
        ]);

        Entrollment::create($request->all());
        return redirect()->route('entrollments.index')->with('success', 'Entrollment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $entrollment = Entrollment::findOrFail($id);
        return view('entrollments.show', compact('entrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $entrollment = Entrollment::findOrFail($id);
        $students = Student::all(); // Fetch all students
        $batches = Batch::all();    // Fetch all batches
        return view('entrollments.edit', compact('entrollment', 'students', 'batches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'entroll_no' => 'required|string',
            'batch_id' => 'required|exists:batchs,id',
            'student_id' => 'required|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric',
        ]);

        $entrollment = Entrollment::findOrFail($id);
        $entrollment->update($request->all());
        return redirect()->route('entrollments.index')->with('success', 'Entrollment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entrollment = Entrollment::findOrFail($id);
        $entrollment->delete();
        return redirect()->route('entrollments.index')->with('success', 'Entrollment deleted successfully.');
    }
}
