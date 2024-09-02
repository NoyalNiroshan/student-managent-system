<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'patments';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'entrollment_id',
        'paid_date',
        'amount',
    ];

// Payment.php
protected $casts = [
    'amount' => 'float',
];

    // Relationship with the Enrollment model
    public function enrollment()
    {
        return $this->belongsTo(Entrollment::class, 'entrollment_id');
    }
    use HasFactory;
}
