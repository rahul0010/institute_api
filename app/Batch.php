<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = ['start_time', 'end_time'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function students()
    {
        return $this->hasMany('App/Student');
    }
}
