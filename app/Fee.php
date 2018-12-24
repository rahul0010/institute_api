<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'course_name',
        'installment_no',
        'total_fee',
        'fees_paid',
        'payment_due',
        'amount',
        'payment_date',
        'total_fees_paid',
        'balance'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function student()
    {
        return $this->belongsToMany('App/Student');
    }
}
