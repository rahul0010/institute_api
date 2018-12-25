<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'photo_url',
        'phone',
        'qualification',
        'aadhar',
        'faculty_id',
        'course_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function course()
    {
        return $this->hasOne('App/Course');
    }

    public function faculty()
    {
        return $this->belongsTo('App/Faculty');
    }
}
