<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\EntrollmentController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('layouts.header');
});

Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('courses', CourseController::class);
Route::resource('batchdetails', BatchController::class);
Route::resource('entrollments', EntrollmentController::class);
Route::resource('payments', PaymentController::class);
Route::get('payments/{id}/report', [PaymentController::class, 'generateReport'])->name('payments.report');
 Route::get('payments/{id}/download', [PaymentController::class, 'downloadPdf'])->name('payments.downloadPdf');




