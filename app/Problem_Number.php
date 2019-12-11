<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem_Number extends Model
{
    protected $table = 'problem_numbers';
    function problem(){
        return $this->belongsTo(Problem::class);
    }
}
