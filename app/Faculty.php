<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
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
        'designation'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function students()
    {
        $this->hasMany('App/Student');
    }
}
