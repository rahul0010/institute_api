<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'duration',
        'image_url',
        'total_fee',
        'syllabus_link'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function fees()
    {
        return $this->hasMany('App/Fee');
    }

    public function students()
    {
        return $this->belongsToMay('App/Student');
    }
}
