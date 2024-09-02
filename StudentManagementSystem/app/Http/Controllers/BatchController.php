<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Course;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::all();
        return view('batchdetails.index', compact('batches'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('batchdetails.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'start_date' => 'required|date',
        ]);

        Batch::create($request->all());

        return redirect()->route('batchdetails.index')->with('success', 'Batch created successfully.');
    }



    public function show($id)
{
    $batch = Batch::find($id); // Fetch the batch by ID
    if (!$batch) {
        return redirect()->route('batchdetails.index')->with('error', 'Batch not found.');
    }
    return view('batchdetails.show', compact('batch'));
}



    public function edit($id)
{
    $batch = Batch::find($id); // Fetch the batch by ID
    if (!$batch) {
        return redirect()->route('batchdetails.index')->with('error', 'Batch not found.');
    }
    $courses = Course::all();
    return view('batchdetails.edit', compact('batch', 'courses'));
}


public function update(Request $request, $id)
{

    $batch = Batch::findOrFail($id);
    $request->validate([
        'name' => 'required|string|max:255',
        'course_id' => 'required|exists:courses,id',
        'start_date' => 'required|date',
    ]);


    $batch->update($request->only(['name', 'course_id', 'start_date']));
    return redirect()->route('batchdetails.index')->with('success', 'Batch updated successfully.');
}


    public function destroy($id)
{
    $batch = Batch::findOrFail($id);
    $batch->delete();
    return redirect()->route('batchdetails.index')->with('success', 'Batch deleted successfully.');
}
}
