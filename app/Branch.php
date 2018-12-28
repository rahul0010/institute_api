<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['location'];

    public function Students()
    {
        $this->hasMany('App/Students');
    }
}
