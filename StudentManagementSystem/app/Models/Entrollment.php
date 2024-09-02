<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrollment extends Model
{
    use HasFactory;

    // Define fillable fields if needed
    protected $fillable = [
        'entroll_no',
        'batch_id',
        'student_id',
        'join_date',
        'fee'
    ];

    // Enrollment.php
protected $casts = [
    'fee' => 'float',
];


    // Define relationships if necessary
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
{
    return $this->belongsTo(Course::class)->withDefault([
        'name' => 'Not Assigned',
    ]);
}

}
